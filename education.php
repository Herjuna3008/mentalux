<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education - Mentalux</title>
    <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/education.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="hero-education">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Education</li>
                </ol>
            </nav>

            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill">Knowledge Hub</span>
                    <h1 class="display-4 fw-bold text-dark mb-3">Understand Your Mind, <span class="text-primary">Heal Your Soul.</span></h1>
                    <p class="lead text-muted mb-4">
                        MentalUX menyediakan edukasi kesehatan mental yang dikurasi oleh ahli.
                        Temukan jawaban atas kecemasanmu dan pelajari cara merawat diri dengan benar.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <div class="card-header bg-white border-0 pt-3 px-3">
                            <span class="badge bg-danger"><i class="fab fa-youtube me-1"></i> Video of Psychology</span>
                        </div>
                        <div class="ratio ratio-16x9 video-wrapper">
                            <iframe
                                src="https://www.youtube-nocookie.com/embed/3lWja7H9_Zw?rel=0"
                                title="Mental Health Explained"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold">Apa itu Kesehatan Mental?</h5>
                            <p class="text-muted small mb-0">Pelajari dasar-dasar kesehatan mental dari dr. Audrey Natalia (Halodoc).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h3 class="fw-bold">Latest Articles & Tips</h3>
                    <p class="text-muted mb-0">Bacaan singkat untuk menemani harimu.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-hover h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1758598497429-6eb3895d5bfa?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Stress" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-warning text-dark mb-2">Work Life</span>
                            <h5 class="card-title fw-bold">Mengatasi Burnout Kerja</h5>
                            <p class="card-text text-muted small">Merasa lelah terus menerus? Kenali tanda-tanda burnout sebelum terlambat.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0">
                            <a href="article_detail.php?id=1" class="text-primary text-decoration-none small fw-bold">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-hover h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Meditation" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Mindfulness</span>
                            <h5 class="card-title fw-bold">Teknik Pernapasan 4-7-8</h5>
                            <p class="card-text text-muted small">Cara cepat menenangkan diri saat panik menyerang dalam hitungan menit.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0">
                            <a href="article_detail.php?id=2" class="text-primary text-decoration-none small fw-bold">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-hover h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?q=80&w=600&auto=format&fit=crop" class="card-img-top" alt="Community" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-info text-white mb-2">Relationship</span>
                            <h5 class="card-title fw-bold">Menjadi Pendengar Baik</h5>
                            <p class="card-text text-muted small">Bagaimana cara mendukung teman yang sedang mengalami masa sulit.</p>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0">
                            <a href="article_detail.php?id=3" class="text-primary text-decoration-none small fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="bg-primary text-white rounded-4 p-5 text-center shadow position-relative overflow-hidden">
                <div class="position-relative z-1">
                    <h2 class="fw-bold mb-3">Butuh Bantuan Lebih Lanjut?</h2>
                    <p class="lead mb-4 opacity-75">Edukasi adalah langkah awal. Jika kamu merasa berat, psikolog kami siap mendengarkan.</p>
                    <a href="psychologist.php" class="btn btn-light btn-lg text-primary fw-bold px-5 rounded-pill">Cari Psikolog Sekarang</a>
                </div>
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255,255,255,0.1);"></div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>

</html>