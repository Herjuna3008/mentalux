<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mentalux</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    @include('navbar')

    <!-- Main Section -->
    <section class="bg-primary-subtle py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card bg-white rounded shadow p-4">
                        <h2 class="text-center text-primary mb-4">Please login to continue</h2>
                        <form method="POST" action="{{ route('login.process') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required style="padding-right: 50px;">
                                <label for="password">Password</label>

                                <span class="position-absolute top-50 end-0 translate-middle-y me-3"
                                    id="togglePassword" style="cursor: pointer; z-index: 10;">
                                    <i class="fas fa-eye text-secondary"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember_me" value="1">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgotpass.html" class="small text-primary">Forgot password?</a>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    By login account you agree with our <a href="#" class="text-primary">Terms and Conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">LOGIN</button>
                        </form>
                        <div class="text-center mt-4">
                            <p class="small mb-3">Don't have an Account? Create one!!</p>
                            <div class="row g-1 d-flex justify-content-center">
                                <div class="w-100">
                                    <a href="{{ route('signup') }}" class="btn btn-outline-primary w-100">
                                        Click Here to create an Account!!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('footer')

    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const icon = togglePassword.querySelector('i');

        togglePassword.addEventListener('click', function() {
            // Cek tipe password atau text
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Ganti ikon
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>