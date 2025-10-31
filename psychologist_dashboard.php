<?php

declare(strict_types=1);

require_once __DIR__ . '/php/auth.php';

try {
    $mysqli = get_db_connection();
} catch (Throwable $exception) {
    http_response_code(500);
    echo '<h2>Gagal memuat dashboard</h2>';
    echo '<p>' . htmlspecialchars($exception->getMessage(), ENT_QUOTES | ENT_HTML5, 'UTF-8') . '</p>';
    exit;
}

ensure_authenticated($mysqli, ['PSYCHOLOGIST', 'ADMIN']);

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologist Dashboard - Mentalux</title>
    <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title">Halo, Psikolog Mentalux!</h1>
                <p class="card-text">Kelola jadwal konsultasi, pantau perkembangan klien, dan bagikan materi edukasi dari sini.</p>
                <p class="mb-0">Terima kasih telah mendukung kesehatan mental para pengguna kami.</p>
            </div>
        </div>
    </div>
</body>

</html>
