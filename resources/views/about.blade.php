<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Mentalux</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}"> <!-- <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">
</head>

<body>
    @include('navbar')

    <section class="hero-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <span class="text-primary fw-bold text-uppercase ls-1">Our Story</span>
                    <h1 class="display-4 fw-bold mb-4">Mewujudkan Kesehatan Mental untuk Semua</h1>
                    <p class="lead text-secondary mb-4">
                        MentalUX lahir dari sebuah kepedulian sederhana: setiap orang berhak didengar.
                        Kami menggabungkan empati manusia dengan kemudahan teknologi untuk menciptakan ruang aman bagi siapa saja.
                    </p>

                    <div class="d-flex gap-4 mt-4">
                        <div class="stat-card">
                            <h3 class="fw-bold mb-0">500+</h3>
                            <small class="text-muted">Sesi Konseling</small>
                        </div>
                        <div class="stat-card">
                            <h3 class="fw-bold mb-0">50+</h3>
                            <small class="text-muted">Psikolog Aktif</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://plus.unsplash.com/premium_photo-1682310144714-cb77b1e6d64a?q=80&w=800&auto=format&fit=crop" alt="Dukungan Komunitas MentalUX" class="img-fluid about-img shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Choose MentalUX?</h2>
                <p class="text-muted">Kami memastikan layanan ini memberikan hal-hal berikut untukmu.</p>
            </div>

            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="card h-100 border-0 p-4 feature-card">
                        <div class="d-flex justify-content-center">
                            <div class="icon-box"><i class="fas fa-user-shield"></i></div>
                        </div>
                        <h5 class="fw-bold">Privasi Terjaga</h5>
                        <p class="text-muted small">Identitas dan semua curhatan kamu dijamin aman di sini. Tidak akan ada yang tahu, jadi kamu bisa bercerita apa saja dengan tenang dan bebas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 p-4 feature-card">
                        <div class="d-flex justify-content-center">
                            <div class="icon-box"><i class="fas fa-user-md"></i></div>
                        </div>
                        <h5 class="fw-bold">Psikolog Profesional</h5>
                        <p class="text-muted small">Jangan khawatir, Anda bercerita kepada orang yang tepat. Psikolog kami adalah tenaga ahli yang siap mendengarkan dan membantu mencari solusi anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 p-4 feature-card">
                        <div class="d-flex justify-content-center">
                            <div class="icon-box"><i class="fas fa-heart"></i></div>
                        </div>
                        <h5 class="fw-bold">Edukasi</h5>
                        <p class="text-muted small">Kami memberikan edukasi kesehatan mental yang akurat, praktis, dan mudah dipahami untuk membantu Anda mengenali gejala sejak dini.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Dampak Nyata Kami</h2>
                <p class="text-muted">Dengarkan kisah mereka yang telah memulai perjalanan pemulihan bersama MentalUX.</p>
            </div>

            <div class="row g-4 justify-content-center">

                <div class="col-lg-5 col-md-6">
                    <div class="card border-0 shadow-lg p-4 h-100">
                        <div class="card-body">
                            <i class="fas fa-quote-left fa-2x text-primary mb-3 opacity-50"></i>
                            <p class="lead small fst-italic text-secondary">
                                "Saya merasa beban pikiran saya berkurang drastis setelah 3 sesi. Psikolognya sangat profesional dan tempatnya terasa aman untuk bercerita tanpa takut dihakimi."
                            </p>
                            <hr>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=Ahmad+F&background=ced4da&color=495057&size=60" class="rounded-circle me-3" alt="Client 1">
                                <div>
                                    <h6 class="fw-bold mb-0">Kipli</h6>
                                    <small class="text-primary">User sejak 2025</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="card border-0 shadow-lg p-4 h-100">
                        <div class="card-body">
                            <i class="fas fa-quote-left fa-2x text-primary mb-3 opacity-50"></i>
                            <p class="lead small fst-italic text-secondary">
                                "Fitur edukasinya sangat membantu. Saya jadi tahu kalau yang saya alami itu bukan keanehan, tapi gejala yang bisa diatasi. Terima kasih, MentalUX."
                            </p>
                            <hr>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=Dewi+S&background=ced4da&color=495057&size=60" class="rounded-circle me-3" alt="Client 2">
                                <div>
                                    <h6 class="fw-bold mb-0">Dewi S.</h6>
                                    <small class="text-primary">Mendapatkan Insight</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Siap Memulai Perjalananmu?</h2>
            <p class="lead text-muted mb-4">Jangan biarkan masalahmu menumpuk. Mari bicara.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="psychologist.php" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Book Appointment</a>
            </div>
        </div>
    </section>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>