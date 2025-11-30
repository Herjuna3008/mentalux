<footer class="bg-dark text-light pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row justify-content-between"> <div class="col-md-6 col-lg-5 mb-4">
                <h4 class="fw-bold text-primary mb-3">MentalUX</h4>
                <p class="text-secondary small" style="line-height: 1.8;">
                    Platform kesehatan mental yang dirancang untuk memberikan ruang aman, dukungan profesional, dan edukasi bagi kesehatan jiwa Anda.
                </p>
            </div>

            <div class="col-md-5 col-lg-4 mb-4 text-md-end"> 
                <h5 class="fw-bold mb-3 text-white">Quick Navigation</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="index.php" class="text-secondary text-decoration-none footer-link">Home</a></li>
                    <li class="mb-2"><a href="about.php" class="text-secondary text-decoration-none footer-link">About Us</a></li>
                    <li class="mb-2"><a href="psychologist.php" class="text-secondary text-decoration-none footer-link">Find Psychologists</a></li>
                    <li class="mb-2"><a href="education.php" class="text-secondary text-decoration-none footer-link">Education Center</a></li>
                </ul>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="small text-secondary mb-0">Copyright © 2025 MentalUX. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="text-secondary small text-decoration-none me-3 hover-white">Privacy Policy</a>
                <a href="#" class="text-secondary small text-decoration-none hover-white">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-link {
        transition: all 0.3s ease;
        display: inline-block;
    }
    .footer-link:hover {
        color: #fff !important;
        transform: translateX(5px); /* Efek geser dikit pas di-hover */
    }
    /* Khusus kalau layout rata kanan, gesernya ke kiri */
    .text-md-end .footer-link:hover {
        transform: translateX(-5px); 
    }
    
    .social-hover {
        transition: color 0.3s;
    }
    .social-hover:hover {
        color: var(--primary-color, #4a6cf7) !important;
    }
    .hover-white:hover {
        color: #fff !important;
    }
</style>