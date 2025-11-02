<?php

declare(strict_types=1);

require_once __DIR__ . '/http.php';
require_once __DIR__ . '/config.php';

handle_preflight_request(['POST']);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../signup.html');
    exit;
}

$username = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
$email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

$errors = [];

if ($username === '') {
    $errors[] = 'Username wajib diisi.';
} elseif (strlen($username) < 3) {
    $errors[] = 'Username minimal 3 karakter.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

if ($password === '') {
    $errors[] = 'Password wajib diisi.';
} elseif (strlen($password) < 8) {
    $errors[] = 'Password minimal 8 karakter.';
}

if ($password !== $confirmPassword) {
    $errors[] = 'Password dan konfirmasi tidak sesuai.';
}

if ($errors !== []) {
    echo '<h2>Registrasi gagal</h2>';
    echo '<ul>';
    foreach ($errors as $error) {
        echo '<li>' . htmlspecialchars($error, ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</li>';
    }
    echo '</ul>';
    echo '<p><a href="../signup.html">Kembali ke halaman signup</a></p>';
    exit;
}

try {
    $mysqli = get_db_connection();

    $statement = $mysqli->prepare('SELECT id FROM account WHERE email = ? LIMIT 1');
    $statement->bind_param('s', $email);
    $statement->execute();
    $statement->store_result();

    if ($statement->num_rows > 0) {
        $statement->close();
        $mysqli->close();
        echo '<h2>Registrasi gagal</h2>';
        echo '<p>Email sudah terdaftar. Silakan gunakan email lain atau login.</p>';
        echo '<p><a href="../Login.html">Kembali ke halaman login</a></p>';
        exit;
    }

    $statement->close();

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $role = 'CUSTOMER';

    $insert = $mysqli->prepare('INSERT INTO account (username, email, password, role) VALUES (?, ?, ?, ?)');
    $insert->bind_param('ssss', $username, $email, $hashedPassword, $role);
    $insert->execute();
    $insert->close();

    $mysqli->close();

    echo '<h2>Registrasi berhasil!</h2>';
    echo '<p>Akun Anda berhasil dibuat. Silakan <a href="../Login.html">login di sini</a>.</p>';
} catch (Throwable $exception) {
    if (isset($mysqli) && $mysqli instanceof mysqli) {
        $mysqli->close();
    }
    http_response_code(500);
    echo '<h2>Terjadi kesalahan</h2>';
    echo '<p>' . htmlspecialchars($exception->getMessage(), ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</p>';
    echo '<p><a href="../signup.html">Kembali ke halaman signup</a></p>';
}
