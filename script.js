$(document).ready(function() {
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const targetId = $(this).attr('href');
        if (targetId === '#') return;

        const targetElement = $(targetId);
        if (targetElement.length) {
            $('html, body').animate({
                scrollTop: targetElement.offset().top - 80 // Adjust for header height
            }, 500);
        }
    });

    const header = $('header');
    const headerHeight = header.outerHeight();

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > headerHeight) {
            header.css('box-shadow', '0 2px 10px rgba(0, 0, 0, 0.1)');
        } else {
            header.css('box-shadow', 'none');
        }
    });

    const packageCards = $('.package');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).css({
                    opacity: 1,
                    transform: 'translateY(0)'
                });
            }
        });
    }, { threshold: 0.1 });

    packageCards.css({
        opacity: 0,
        transform: 'translateY(20px)',
        transition: 'opacity 0.5s ease, transform 0.5s ease'
    });

    packageCards.each(function() {
        observer.observe(this);
    });

    $('.buy-btn').on('click', function(e) {
        e.preventDefault();
        const packageTitle = $(this).parent().find('h3').text();
        const packagePrice = $(this).parent().find('.price').text();

        alert(`Added to cart: ${packageTitle} - ${packagePrice}`);
    });

    const loginForm = $('form');
    if (loginForm.length) {
        loginForm.on('submit', function(e) {
            e.preventDefault();
            // Logika login akan ditambahkan di sini
            alert('Login functionality would be implemented here.');
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    form.addEventListener("submit", function (event) {
        if (password.value !== confirmPassword.value) {
            event.preventDefault(); // Prevent form submission
            alert("Passwords do not match! Please try again.");
        }
    });
});
