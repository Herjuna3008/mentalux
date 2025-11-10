<?php

declare(strict_types=1);

require_once __DIR__ . '/http.php';
require_once __DIR__ . '/auth.php';

handle_preflight_request(['POST']);

ensure_session_started();

try {
    $mysqli = get_db_connection();
} catch (Throwable $exception) {
    http_response_code(500);
    echo '<h2>Terjadi kesalahan koneksi</h2>';
    echo '<p>' . htmlspecialchars($exception->getMessage(), ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</p>';
    exit;
}

function render_login_error(mysqli $mysqli, string $message): void
{
    $mysqli->close();
    echo '<h2>Login gagal</h2>';
    echo '<p>' . htmlspecialchars($message, ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</p>';
    echo '<p><a href="../Login.html">Coba lagi</a></p>';
    exit;
}

$userFromCookie = get_user_from_cookie($mysqli);
if ($userFromCookie !== null) {
    start_user_session($userFromCookie);
    $mysqli->close();
    redirect_to_role($userFromCookie['role'], '../');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $mysqli->close();
    redirect_to_login('../');
}

$email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
$password = $_POST['password'] ?? '';
$rememberMe = isset($_POST['remember_me']);

if ($email === '' || $password === '') {
    render_login_error($mysqli, 'Email dan password wajib diisi.');
}

$statement = $mysqli->prepare('SELECT id, username, email, password, role FROM account WHERE email = ? LIMIT 1');
$statement->bind_param('s', $email);
$statement->execute();
$result = $statement->get_result();
$user = $result->fetch_assoc();
$statement->close();

if (!$user || !password_verify($password, $user['password'])) {
    render_login_error($mysqli, 'Email atau password salah.');
}

start_user_session([
    'id' => (int) $user['id'],
    'username' => $user['username'],
    'email' => $user['email'],
    'password' => $user['password'],
    'role' => $user['role'],
]);

if ($rememberMe) {
    set_remember_me_cookie((int) $user['id'], $user['password']);
} else {
    clear_auth_cookie();
}

$mysqli->close();
redirect_to_role($user['role'], '../');
