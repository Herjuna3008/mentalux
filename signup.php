<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Mentalux</title>
    <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Section -->
    <section class="bg-primary-subtle py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card bg-white rounded shadow p-4">
                        <h2 class="text-center text-primary mb-4">Please Sign Up to continue</h2>
                        <form method="POST" action="php/signup_user.php">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="User Name" required>
                                <label for="username">User Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
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
                                <input type="password" class="form-control" id="confirm-password" name="confirm_password"
                                    placeholder="Confirm Password" required minlength="8" maxlength="64" style="padding-right: 45px;">
                                <label for="confirm-password">Confirm Password</label>

                                <span class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer" id="toggleConfirmPassword" style="cursor: pointer;">
                                    <i class="fas fa-eye text-secondary"></i>
                                </span>
                            </div>
                            <label for="role">Pilih Role:</label>
                            <select name="role" required>
                                <option value="Customer">Customer</option>
                                <option value="Psychologist">Psychologist</option>
                                <option value="Admin">Admin</option>
                            </select>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    By creating account you agree with our <a href="#" class="text-primary">Terms and
                                        Conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">SIGN UP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/script.js"></script>
    <script>
        // Fungsi untuk mengurus Toggle Password
        function setupPasswordToggle(inputId, iconId) {
            const input = document.getElementById(inputId);
            const iconSpan = document.getElementById(iconId);
            const icon = iconSpan.querySelector('i');

            iconSpan.addEventListener('click', function() {
                // Cek tipe saat ini
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);

                // Ganti Icon
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        }

        // Jalankan fungsi untuk kedua kolom
        setupPasswordToggle('password', 'togglePassword');
        setupPasswordToggle('confirm-password', 'toggleConfirmPassword');
    </script>
</body>

</html>