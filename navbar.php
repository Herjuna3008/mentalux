<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <div class="container">
        
        <a class="navbar-brand" href="index.php">
            <img src="public/logo.png" alt="MentalUX" class="logo-nav">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary fw-bold" href="psychologist.php">Psychologist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="education.php">Education</a>
                </li>
            </ul>

            <div class="d-flex flex-column flex-lg-row gap-2 justify-content-center mt-3 mt-lg-0">
                <a href="login.php" class="btn btn-outline-primary border-0">Log in</a>
                <a href="#" class="btn btn-primary rounded-pill px-4">Get Started</a>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Atur tinggi logo biar pas di HP dan Laptop */
    .logo-nav {
        height: 85px;  
        width: auto;   
        max-width: 100%;
    }

    /* Jarak antar menu di mobile biar ga dempet */
    .nav-item {
        margin: 5px 0;
    }
    
    /* Link hover effect */
    .nav-link:hover {
        color: #0d6efd !important; /* Biru Bootstrap */
    }
</style>