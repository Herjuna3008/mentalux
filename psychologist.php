<?php
// ==========================================
// DATA PSIKOLOG (DATABASE SEMENTARA)
// ==========================================
$psychologists = [
    [
        "name" => "Dr. Dicky Oktrianda",
        "role" => "Dokter Jiwa (Psychiatrist)",
        "specialist" => "Medical Psychiatry",
        "image" => "public/img/psikolog/drDicky.png",
        "desc" => "Seorang dokter yang memfokuskan keahliannya pada bidang kesehatan jiwa dan penanganan kondisi psikis secara medis.",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Amanda Angela S.Psi, M.Psi",
        "role" => "Psikolog Klinis",
        "specialist" => "Adult & Trauma",
        "image" => "public/img/psikolog/drAmanda.png",
        "desc" => "Psikolog alumnus Universitas Surabaya (2013) dan Unpad (2018), berpengalaman menangani trauma mendalam.",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Patricia Elfira Finny S.Psi",
        "role" => "Psikolog Klinis",
        "specialist" => "General Mental Health",
        "image" => "public/img/psikolog/drPatricia.png",
        "desc" => "Berpengalaman 9 tahun memberikan layanan konsultasi terkait kesehatan mental dan pengembangan diri.",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Mila Rahmawati M.Psi",
        "role" => "Psikolog Klinis Dewasa",
        "specialist" => "Family & Marriage",
        "image" => "public/img/psikolog/drMila.jpg", // Perhatikan ekstensi jpg
        "desc" => "Berpengalaman 13 tahun menangani masalah rumah tangga, pasangan, dan kecemasan pada orang dewasa.",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Munazilah S.Psi, M.Psi",
        "role" => "Psikolog Klinis",
        "specialist" => "Self Development",
        "image" => "public/img/psikolog/drMunazilah.jpg", // Perhatikan ekstensi jpg
        "desc" => "Memiliki pengalaman 6 tahun membantu individu menemukan potensi terbaik dan mengatasi hambatan mental.",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Ayu Hidayati M.Psi",
        "role" => "Psikolog Klinis",
        "specialist" => "Stress & Burnout",
        "image" => "public/img/psikolog/drAyu.jpg", // Perhatikan ekstensi jpg
        "desc" => "Ahli dalam manajemen stres pekerjaan, burnout, dan keseimbangan hidup (work-life balance).",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Bayu Prasetya Yudha S.Psi",
        "role" => "Psikolog Klinis",
        "specialist" => "Men's Mental Health",
        "image" => "public/img/psikolog/drBayu.png",
        "desc" => "Psikolog yang fokus membantu pria dan dewasa muda dalam mengelola emosi dan tekanan sosial.",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Dharma Novriansyah, M.Psi",
        "role" => "Psikolog Klinis",
        "specialist" => "Behavioral Therapy",
        "image" => "public/img/psikolog/drDharma.png",
        "desc" => "Memberikan layanan konseling dengan pendekatan praktis dan terapi perilaku kognitif (CBT).",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ],
    [
        "name" => "Giavanny P. M.Psi",
        "role" => "Psikolog Anak & Remaja",
        "specialist" => "Child & Teen",
        "image" => "public/img/psikolog/drGiavanny.png",
        "desc" => "Memiliki pemahaman mendalam pada proses tumbuh kembang anak dan masalah emosi remaja.",
        "session" => "2 Hours",
        "price" => "Rp 200.000"
    ]
];

// SEARCH
$keyword = ""; // Default kosong
$tampil_data = $psychologists; // Default tampilkan semua

// Cek apakah user lagi nyari sesuatu?
if (isset($_GET['cari']) && !empty($_GET['cari'])) {
    $keyword = $_GET['cari'];

    // Filter array berdasarkan Nama ATAU Spesialisasi
    $tampil_data = array_filter($psychologists, function ($item) use ($keyword) {
        // stripos = cari teks tanpa peduli huruf besar/kecil
        return stripos($item['name'], $keyword) !== false ||
            stripos($item['specialist'], $keyword) !== false ||
            stripos($item['role'], $keyword) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Psychologist - MentalUX</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <section class="hero-psych">
        <div class="container text-center">
            <nav aria-label="breadcrumb" class="d-flex justify-content-center mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Psychologist</li>
                </ol>
            </nav>

            <h1 class="display-4 fw-bold mb-3 text-dark">Temukan <span class="text-primary">Psikolog</span> Terbaikmu</h1>
            <p class="lead text-muted mb-5 mx-auto" style="max-width: 700px;">
                Psikolog kami telah terverifikasi dan siap memberikan ruang aman bagi Anda untuk bercerita, memahami diri, dan memulihkan kondisi mental.
            </p>

            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <form action="" method="GET" class="position-relative">
                        <input type="text" name="cari" class="form-control search-bar"
                            placeholder="Cari nama psikolog (contoh: Dicky)..."
                            value="<?php echo htmlspecialchars($keyword); ?>"> <button type="submit" class="btn btn-primary rounded-circle position-absolute top-50 end-0 translate-middle-y me-2" style="width: 40px; height: 40px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <?php foreach ($tampil_data as $psy): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-psych h-100">

                            <div class="img-wrapper">
                                <img src="<?php echo $psy['image']; ?>" alt="<?php echo $psy['name']; ?>" class="psych-img">
                            </div>

                            <div class="card-body p-4">
                                <span class="badge-spec"><?php echo $psy['specialist']; ?></span>

                                <h5 class="fw-bold mb-1 text-dark"><?php echo $psy['name']; ?></h5>
                                <p class="text-muted small mb-3"><?php echo $psy['role']; ?></p>

                                <p class="text-secondary small mb-4" style="min-height: 60px;">
                                    <?php
                                    // Memotong teks jika terlalu panjang biar kartu rata
                                    $desc = $psy['desc'];
                                    if (strlen($desc) > 90) {
                                        echo substr($desc, 0, 90) . '...';
                                    } else {
                                        echo $desc;
                                    }
                                    ?>
                                </p>

                                <hr class="border-light">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="price-tag"><?php echo $psy['price']; ?></div>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i> <?php echo $psy['session']; ?></small>
                                    </div>
                                    <a href="#" class="btn btn-primary rounded-pill px-4 fw-bold btn-sm">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>