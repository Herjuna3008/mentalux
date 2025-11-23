<?php
// Ambil ID dari URL (contoh: article_detail.php?id=1)
$id = $_GET['id'] ?? '1';

// DATA DUMMY (Nanti ini bisa diganti ambil dari Database)
$articles = [
    '1' => [
        'title' => 'Mengatasi Burnout Kerja',
        'category' => 'Work Life',
        'image' => 'https://images.unsplash.com/photo-1758598497429-6eb3895d5bfa?q=80&w=600&auto=format&fit=crop',
        'content' => '
            <p>Merasa lelah terus menerus? Itu bukan sekadar capek biasa. Burnout adalah kondisi kelelahan emosional, fisik, dan mental yang disebabkan oleh stres berlebihan dan berkepanjangan.</p>
            <h3>Tanda-tanda Burnout:</h3>
            <ul>
                <li>Kehilangan motivasi kerja.</li>
                <li>Merasa tidak berdaya atau terjebak.</li>
                <li>Menarik diri dari tanggung jawab.</li>
            </ul>
            <p>Cara mengatasinya adalah dengan menetapkan batasan (boundaries) yang jelas antara pekerjaan dan kehidupan pribadi. Mulailah dengan tidak mengecek email di luar jam kerja.</p>
        '
    ],
    '2' => [
        'title' => 'Teknik Pernapasan 4-7-8',
        'category' => 'Mindfulness',
        'image' => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=1200&auto=format&fit=crop',
        'content' => '
            <p>Saat panik menyerang, napas kita cenderung pendek dan cepat. Teknik 4-7-8 adalah cara "reset" sistem saraf Anda.</p>
            <h3>Caranya:</h3>
            <ol>
                <li>Tarik napas melalui hidung selama <strong>4 detik</strong>.</li>
                <li>Tahan napas selama <strong>7 detik</strong>.</li>
                <li>Hembuskan perlahan melalui mulut selama <strong>8 detik</strong> (seperti meniup lilin).</li>
            </ol>
            <p>Ulangi siklus ini sebanyak 4 kali. Ini akan memaksa detak jantung Anda melambat dan pikiran menjadi lebih tenang.</p>
        '
    ],
    '3' => [
        'title' => 'Menjadi Pendengar Baik',
        'category' => 'Relationship',
        'image' => 'https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?q=80&w=1200&auto=format&fit=crop',
        'content' => '
            <p>Seringkali teman kita curhat bukan butuh solusi, tapi butuh didengar. Menjadi pendengar aktif (Active Listening) adalah kunci hubungan yang sehat.</p>
            <p>Hindari memotong pembicaraan atau langsung menghakimi. Cukup hadir, tatap matanya, dan validasi perasaannya dengan kalimat seperti "Aku paham itu pasti berat buat kamu".</p>
        '
    ]
];

// Cek apakah artikel ada? Kalau gak ada, default ke artikel 1
$data = $articles[$id] ?? $articles['1'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?> - MentalUX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <header style="height: 400px; background: url('<?php echo $data['image']; ?>') no-repeat center center/cover; position: relative;">
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);"></div>
        <div class="container h-100 d-flex align-items-end pb-5 position-relative z-1">
            <div class="text-white">
                <span class="badge bg-primary mb-2"><?php echo $data['category']; ?></span>
                <h1 class="display-4 fw-bold"><?php echo $data['title']; ?></h1>
            </div>
        </div>
    </header>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="education.php" class="text-decoration-none text-muted mb-4 d-inline-block">
                    <i class="fas fa-arrow-left me-2"></i> Back to Education
                </a>

                <article class="lh-lg fs-5 text-secondary">
                    <?php echo $data['content']; ?>
                </article>

                <hr class="my-5">

                <div class="d-flex align-items-center gap-3">
                    <span class="fw-bold text-dark">Share this article:</span>
                    <button class="btn btn-outline-primary btn-sm rounded-circle"><i class="fab fa-whatsapp"></i></button>
                    <button class="btn btn-outline-primary btn-sm rounded-circle"><i class="fab fa-twitter"></i></button>
                    <button class="btn btn-outline-primary btn-sm rounded-circle"><i class="fas fa-link"></i></button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>