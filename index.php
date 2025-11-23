<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MentalUX - Professional Psychological Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css"/>
    <link rel="stylesheet" href="public/css/index.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Support for You & Your Loved Ones</h1>
                    <h4 class="fw-light mb-4 typewriter">
                        Understand difficult situations with professional emotional support.
                    </h4>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="#packages" class="btn btn-light btn-lg px-4 gap-3 text-primary fw-bold">Get Started</a>
                        <a href="education.php" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <i class="fas fa-user-md fa-3x text-primary mb-3"></i>
                    <h5>Licensed Psychologists</h5>
                    <p class="text-muted">Verified experts ready to help.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="fas fa-lock fa-3x text-primary mb-3"></i>
                    <h5>100% Confidential</h5>
                    <p class="text-muted">Your privacy is our top priority.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="fas fa-smile fa-3x text-primary mb-3"></i>
                    <h5>500+ Happy Clients</h5>
                    <p class="text-muted">Regain your happiness today.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="packages" class="packages py-5">
        <div class="container">
            <h2 class="section-title">Our Session Packages</h2>
            <div class="row justify-content-center">
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-price h-100 p-4">
                        <div class="card-body text-center">
                            <h3 class="card-title">Starter</h3>
                            <h6 class="text-muted">2 Sessions</h6>
                            <div class="price-tag my-3">Rp 150.000</div>
                            <p class="text-muted small">Rp 75.000 / session</p>
                            
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> 60 Minutes Consultation</li>
                                <li><i class="fas fa-check"></i> Basic Assessment</li>
                                <li><i class="fas fa-check"></i> Chat Support</li>
                            </ul>
                            
                            <div class="d-grid">
                                <a href="#" class="btn btn-outline-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-price h-100 p-4 border-primary">
                        <div class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary">
                            MOST POPULAR
                        </div>
                        <div class="card-body text-center">
                            <h3 class="card-title">Progress</h3>
                            <h6 class="text-muted">4 Sessions</h6>
                            <div class="price-tag my-3">Rp 280.000</div> 
                            <p class="text-muted small">Rp 70.000 / session (Save 20k)</p>
                            
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> 60 Minutes Consultation</li>
                                <li><i class="fas fa-check"></i> Deep Assessment</li>
                                <li><i class="fas fa-check"></i> Priority Scheduling</li>
                                <li><i class="fas fa-check"></i> Medical Summary</li>
                            </ul>
                            
                            <div class="d-grid">
                                <a href="#" class="btn btn-outline-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-price h-100 p-4">
                        <div class="card-body text-center">
                            <h3 class="card-title">Complete</h3>
                            <h6 class="text-muted">8 Sessions</h6>
                            <div class="price-tag my-3">Rp 520.000</div>
                            <p class="text-muted small">Rp 65.000 / session (Best Value)</p>
                            
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> All Progress Features</li>
                                <li><i class="fas fa-check"></i> Flexible Reschedule</li>
                                <li><i class="fas fa-check"></i> 24/7 Emergency Chat</li>
                                <li><i class="fas fa-check"></i> Monthly Report</li>
                            </ul>
                            
                            <div class="d-grid">
                                <a href="#" class="btn btn-outline-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="social-sharing py-5 text-center">
        <div class="container">
            <p class="lead mb-4">
                Help your friends find the support they need. Share MentalUX on your social networks.
            </p>
            <div class="social-icons mb-4">
                <a href="#" class="social-icon"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin fa-2x"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
            <a href="#" class="btn btn-primary btn-lg rounded-pill">Subscribe to Newsletter</a>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>