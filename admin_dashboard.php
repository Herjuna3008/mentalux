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

ensure_authenticated($mysqli, ['ADMIN']);

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - MentalUX</title>
    <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container" style="margin-top: 100px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">Admin Dashboard</h2>
                <p class="text-muted">Manage users, psychologists, and platform content.</p>
            </div>
            <div class="text-end">
                <span class="badge bg-primary p-2">Admin Mode</span>
                <h5 class="mt-2 mb-0"><?php echo $_SESSION['username']; ?></h5>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 border-start border-4 border-primary">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3 text-primary">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0">Total Users</h6>
                            <h3 class="fw-bold mb-0">1,250</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 border-start border-4 border-success">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3 text-success">
                            <i class="fas fa-user-md fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0">Psychologists</h6>
                            <h3 class="fw-bold mb-0">45</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 border-start border-4 border-warning">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3 text-warning">
                            <i class="fas fa-calendar-check fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0">Total Sessions</h6>
                            <h3 class="fw-bold mb-0">3,400</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="fw-bold mb-3">Management Tools</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><i class="fas fa-user-check me-2 text-primary"></i> Verify Psychologists</h5>
                        <p class="card-text text-muted small">Check new applications and approve licenses.</p>
                        <button class="btn btn-outline-primary btn-sm">Manage Applications</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><i class="fas fa-file-alt me-2 text-success"></i> Content & Articles</h5>
                        <p class="card-text text-muted small">Add new education articles or manage videos.</p>
                        <button class="btn btn-outline-success btn-sm">Manage Content</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-5 text-center">
            <a href="php/logout.php" class="text-danger text-decoration-none fw-bold">
                <i class="fas fa-sign-out-alt"></i> Logout from Admin
            </a>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
