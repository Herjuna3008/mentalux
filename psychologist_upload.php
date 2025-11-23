<?php

declare(strict_types=1);

require_once __DIR__ . '/php/auth.php';
require_once __DIR__ . '/php/config.php';

try {
    $mysqli = get_db_connection();
} catch (Throwable $exception) {
    http_response_code(500);
    echo '<h2>Gagal memuat halaman upload</h2>';
    echo '<p>' . htmlspecialchars($exception->getMessage(), ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</p>';
    exit;
}

ensure_authenticated($mysqli, ['Psychologist', 'Admin']);

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['certificate']) && $_FILES['certificate']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['certificate']['tmp_name'];
        $fileName = basename($_FILES['certificate']['name']);
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Hanya izinkan PDF
        $allowedExt = ['pdf'];
        if (!in_array($fileExt, $allowedExt, true)) {
            $message = '❌ Hanya file PDF yang diizinkan.';
        } elseif ($_FILES['certificate']['size'] > 10 * 1024 * 1024) {
            $message = '⚠️ Ukuran file maksimal adalah 10 MB.';
        } else {
            $uploadDir = __DIR__ . '/uploads/certificates/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0775, true);
            }

            // Bikin nama unik buat file
            $newFileName = 'certificate_' . $_SESSION['user_id'] . '_' . time() . '.' . $fileExt;
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $destPath)) {
                // Simpan data ke tabel psychologist_certificates
                $stmt = $mysqli->prepare('
                    INSERT INTO psychologist_certificates (psychologist_id, certificate_name, certificate_path)
                    VALUES (?, ?, ?)
                ');
                $stmt->bind_param('iss', $_SESSION['user_id'], $fileName, $newFileName);
                $stmt->execute();
                $stmt->close();

                $message = '✅ Sertifikat berhasil diupload.';
            } else {
                $message = '⚠️ Gagal menyimpan file ke server.';
            }
        }
    } else {
        $message = '⚠️ Tidak ada file yang diupload.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Upload Sertifikat Psikolog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="mb-4">Upload Sertifikat Psikolog</h3>

            <?php if ($message): ?>
                <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="certificate">Silakan upload file sertifikat Anda (PDF, max 10 MB):</label>
                    <input type="file" name="certificate" id="certificate" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

            <hr>

            <a href="psychologist_dashboard.php" class="btn btn-secondary">⬅ Kembali ke Dashboard</a>
        </div>
    </div>

</body>

</html>