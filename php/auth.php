<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

function ensure_session_started(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function redirect_to_role(string $role, string $basePath = ''): void
{
    $target = 'customer_dashboard.php';
    if ($role === 'Admin') {
        $target = 'admin_dashboard.php';
    } elseif ($role === 'Psychologist') {
        $target = 'psychologist_dashboard.php';
    }

    header('Location: ' . $basePath . $target);
    exit;
}

function redirect_to_login(string $basePath = ''): void
{
    header('Location: ' . $basePath . 'login.html');
    exit;
}

function clear_auth_cookie(): void
{
    setcookie(AUTH_COOKIE_NAME, '', time() - 3600, '/', '', false, true);
}

function set_remember_me_cookie(int $userId, string $passwordHash): void
{
    $token = hash('sha256', $passwordHash . AUTH_COOKIE_SECRET);
    $cookieValue = $userId . ':' . $token;
    setcookie(AUTH_COOKIE_NAME, $cookieValue, [
        'expires' => time() + AUTH_COOKIE_LIFETIME,
        'path' => '/',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}

function get_user_from_cookie(mysqli $mysqli): ?array
{
    if (!isset($_COOKIE[AUTH_COOKIE_NAME])) {
        return null;
    }

    $cookieValue = $_COOKIE[AUTH_COOKIE_NAME];
    $parts = explode(':', $cookieValue, 2);
    if (count($parts) !== 2) {
        clear_auth_cookie();
        return null;
    }

    [$userId, $token] = $parts;
    if (!ctype_digit($userId)) {
        clear_auth_cookie();
        return null;
    }

    $userIdInt = (int) $userId;

    $statement = $mysqli->prepare('SELECT id, email, password, role FROM account WHERE id = ? LIMIT 1');
    $statement->bind_param('i', $userIdInt);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();
    $statement->close();

    if (!$user) {
        clear_auth_cookie();
        return null;
    }

    $expectedToken = hash('sha256', $user['password'] . AUTH_COOKIE_SECRET);
    if (!hash_equals($expectedToken, $token)) {
        clear_auth_cookie();
        return null;
    }

    return [
        'id' => (int) $user['id'],
        'email' => $user['email'],
        'password' => $user['password'],
        'role' => $user['role'],
    ];
}

function start_user_session(array $user): void
{
    ensure_session_started();
    $_SESSION['user_id'] = (int) $user['id'];
    $_SESSION['role'] = $user['role'];
}

function ensure_authenticated(mysqli $mysqli, array $allowedRoles = [], string $basePath = ''): void
{
    ensure_session_started();

    if (!isset($_SESSION['user_id'])) {
        $userFromCookie = get_user_from_cookie($mysqli);
        if ($userFromCookie !== null) {
            start_user_session($userFromCookie);
        }
    }

    // Kalau belum login sama sekali
    if (!isset($_SESSION['user_id'], $_SESSION['role'])) {
        redirect_to_login($basePath);
    }

    // Kalau role tidak sesuai, baru redirect
    if ($allowedRoles !== [] && !in_array($_SESSION['role'], $allowedRoles, true)) {
        // Hindari redirect ke halaman yang sama (infinite loop)
        $currentPage = basename($_SERVER['PHP_SELF']);
        $targetPage = match ($_SESSION['role']) {
            'Admin' => 'admin_dashboard.php',
            'Psychologist' => 'psychologist_dashboard.php',
            default => 'customer_dashboard.php',
        };

        // Cek biar gak redirect ke halaman yang sama
        if ($currentPage !== $targetPage) {
            redirect_to_role($_SESSION['role'], $basePath);
        }
    }
}