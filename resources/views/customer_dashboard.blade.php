<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customer - MentalUX</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">
    
    <style>
        .dashboard-header {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            padding: 100px 0 50px;
            margin-top: 60px;
        }
        .stat-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

    @include('navbar')

    <section class="dashboard-header text-center">
        <div class="container">
            <h1 class="fw-bold">Welcome back, {{ Auth::user()->username }}!</h1>
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
                                <h5 class="fw-bold mb-0">{{ Auth::user()->email }}</h5>
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
                            <a href="{{ route('psychologist.index') }}" class="btn btn-primary rounded-pill btn-sm px-3">
                                Find Expert
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-5">
                <a href="{{ route('logout') }}" class="btn btn-outline-danger px-4">
                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                </a>
            </div>

        </div>
    </section>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
</body>
</html>