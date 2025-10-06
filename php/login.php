<?php
$database_host = 'united.jagoanhosting.com';
$database_name = 'supersay_mentalux';
$database_username = 'supersay_admin';
$database_password = 'Herjuna_3008';

$mysqli = mysqli_connect($database_host, $database_username, $database_password, $database_name);

if (!$mysqli) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data dari form HTML
$email    = $_POST['email'];
$password = $_POST['password'];

// Enkripsi password biar aman
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database dengan prepared statement
$stmt = $mysqli->prepare("INSERT INTO account (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "Data berhasil disimpan!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
