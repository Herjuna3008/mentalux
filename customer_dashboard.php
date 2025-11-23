<?php
// WAJIB: Mulai session di paling atas biar bisa baca data user
session_start();

// Cek kalau belum login, tendang ke login.php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil data dari session (pastikan pas login lu udah simpen ini)
$username = $_SESSION['username'] ?? 'User';
$email = $_SESSION['email'] ?? 'user@example.com'; // Kalau belum diset di login, bakal default
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customer - MentalUX</title>
    
    <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/customer_dashboard.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <section class="dashboard-header text-center">
        <div class="container">
            <h1 class="fw-bold">Welcome back, <?php echo htmlspecialchars($username); ?>!</h1>
            <p class="opacity-75">Customer Dashboard</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                
                <div class="col-md-4">
                    <div class="card stat-card h-100 p-3">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-primary bg-opacity-10 text-primary me-3">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">My Profile</h6>
                                <h5 class="fw-bold mb-0"><?php echo htmlspecialchars($email); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card stat-card h-100 p-3">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-success bg-opacity-10 text-success me-3">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Upcoming Session</h6>
                                <h5 class="fw-bold mb-0">No Active Session</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card stat-card h-100 p-3">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-1">Need Help?</h6>
                                <p class="text-muted small mb-0">Book a psychologist now</p>
                            </div>
                            <a href="psychologist.php" class="btn btn-primary rounded-pill btn-sm px-3">
                                Find Expert
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-5">
                <a href="php/logout.php" class="btn btn-outline-danger px-4">
                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                </a>
            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>