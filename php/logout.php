<?php
session_start();
// Hapus semua session
session_unset();
session_destroy();

// Hapus cookie remember me (jika ada)
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, '/');
}

// Redirect kembali ke halaman utama
header("Location: ../index.php");
exit;
?>