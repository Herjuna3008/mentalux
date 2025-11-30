<?php
// Pastikan session dimulai agar bisa membaca data user
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}
?>

<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <div class="container position-relative"> 
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('/logo.png') }}" alt="MentalUX" class="logo-nav">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav mb-2 mb-lg-0 text-center absolute-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary fw-bold" href="{{ route('psychologist') }}">Psychologist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('education') }}">Education</a>
                </li>
            </ul>

            <div class="d-flex flex-column flex-lg-row gap-2 justify-content-center mt-3 mt-lg-0 ms-auto align-items-center">
                
                @auth
                    @php
                        // Ambil role dari user yang sedang login
                        $userRole = Auth::user()->role;
                    
                        // LANGKAH PENTING: Konversi role ke huruf kecil untuk perbandingan yang konsisten
                        $checkRole = strtolower($userRole); 
                        
                        $dashboardRoute = 'dashboard.customer'; // Default
                    
                        if ($checkRole === 'admin') { // Akan cocok dengan 'Admin', 'admin', atau 'ADMIN'
                            $dashboardRoute = 'dashboard.admin';
                        } elseif ($checkRole === 'psychologist') { // Akan cocok dengan 'Psychologist', 'psychologist', dll.
                            $dashboardRoute = 'dashboard.psychologist';
                        }
                @endphp
                
                    <div class="dropdown">
                        <a class="btn btn-outline-primary border-0 dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> 
                            Hi, {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route($dashboardRoute) }}">
                                    <i class="fas fa-columns me-2"></i> My Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </div>

                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary border-0">Log in</a>
                    <a href="{{ route('signup') }}" class="btn btn-primary rounded-pill px-4">Get Started</a>
                @endauth

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

    /* Trik Tengah (Dead Center) di Desktop */
    @media (min-width: 992px) {
        .absolute-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>