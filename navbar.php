<?php
// Pastikan session dimulai agar bisa membaca data user
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}
?>

<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <div class="container position-relative"> 
        <a class="navbar-brand" href="index.php">
            <img src="public/logo.png" alt="MentalUX" class="logo-nav">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav mb-2 mb-lg-0 text-center absolute-center">
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

            <div class="d-flex flex-column flex-lg-row gap-2 justify-content-center mt-3 mt-lg-0 ms-auto align-items-center">
                
                <?php if (isset($_SESSION['username'])): ?>
                    <?php 
                        // Tentukan arah dashboard berdasarkan role
                        $dashboardLink = 'customer_dashboard.php'; // Default
                        if (isset($_SESSION['role'])) {
                            if ($_SESSION['role'] === 'admin') {
                                $dashboardLink = 'admin_dashboard.php';
                            } elseif ($_SESSION['role'] === 'psychologist') {
                                $dashboardLink = 'psychologist_dashboard.php';
                            }
                        }
                    ?>

                    <div class="dropdown">
                        <a class="btn btn-outline-primary border-0 dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> 
                            Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo $dashboardLink; ?>">My Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="php/logout.php">Log Out</a></li>
                        </ul>
                    </div>

                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-primary border-0">Log in</a>
                    <a href="signup.php" class="btn btn-primary rounded-pill px-4">Get Started</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>

<style>
    .logo-nav {
        height: 60px;       
        width: auto;       
        max-width: 100%;
    }
    .nav-item {
        margin: 5px 0;
    }
    .nav-link:hover {
        color: #0d6efd !important;
    }

    @media (min-width: 992px) {
        .absolute-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>