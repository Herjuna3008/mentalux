<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Mentalux</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">
</head>

<body>
    @include('navbar')

    <section class="bg-primary-subtle py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card bg-white rounded shadow p-4">
                        <h2 class="text-center text-primary mb-4">Please Sign Up to continue</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('signup.store') }}">
                            @csrf 

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="User Name" required value="{{ old('username') }}">
                                <label for="username">User Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required value="{{ old('email') }}">
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required minlength="8" maxlength="64" style="padding-right: 45px;">
                                <label for="password">Password</label>
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer" id="togglePassword" style="cursor: pointer;">
                                    <i class="fas fa-eye text-secondary"></i>
                                </span>
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="confirm-password" name="password_confirmation"
                                    placeholder="Confirm Password" required minlength="8" maxlength="64" style="padding-right: 45px;">
                                <label for="confirm-password">Confirm Password</label>
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer" id="toggleConfirmPassword" style="cursor: pointer;">
                                    <i class="fas fa-eye text-secondary"></i>
                                </span>
                            </div>

                            <label for="role">Pilih Role:</label>
                            <select name="role" class="form-select mb-3" required>
                                <option value="Customer">Customer</option>
                                <option value="Psychologist">Psychologist</option>
                                <option value="Admin">Admin</option>
                            </select>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    By creating account you agree with our <a href="#" class="text-primary">Terms and Conditions</a>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">SIGN UP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')

    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body p-5">
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h3 class="mb-3 text-success">{{ session('success') }}</h3>
                    <p class="text-muted mb-4">Akun Anda telah berhasil dibuat. Silakan login.</p>
                    
                    <a href="{{ url('/login') }}" class="btn btn-success w-100 py-2">
                        Masuk ke Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    
    <script>
        // 1. Logic Toggle Password
        function setupPasswordToggle(inputId, iconId) {
            const input = document.getElementById(inputId);
            const iconSpan = document.getElementById(iconId);
            
            if(input && iconSpan) { 
                const icon = iconSpan.querySelector('i');
                iconSpan.addEventListener('click', function() {
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                });
            }
        }
        setupPasswordToggle('password', 'togglePassword');
        setupPasswordToggle('confirm-password', 'toggleConfirmPassword');

        var sessionSuccess = "{{ session('success') }}"; // Ambil pesan dari Controller

        if (sessionSuccess) {
            // Kalau ada pesan sukses, jalankan Modal
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            });
        }
    </script>
</body>
</html>