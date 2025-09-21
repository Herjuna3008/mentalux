document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('header');
    const headerHeight = header?.offsetHeight ?? 0;

    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', event => {
            const targetId = link.getAttribute('href');
            if (!targetId || targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (!targetElement) return;

            event.preventDefault();
            const topOffset = targetElement.getBoundingClientRect().top + window.scrollY - headerHeight;
            window.scrollTo({
                top: topOffset,
                behavior: 'smooth'
            });
        });
    });

    const updateHeaderShadow = () => {
        if (window.scrollY > headerHeight) {
            header?.classList.add('header-shadow');
        } else {
            header?.classList.remove('header-shadow');
        }
    };

    updateHeaderShadow();
    window.addEventListener('scroll', updateHeaderShadow, { passive: true });

    const packageCards = document.querySelectorAll('.package');
    packageCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const { target } = entry;
            target.style.opacity = '1';
            target.style.transform = 'translateY(0)';
            observer.unobserve(target);
        });
    }, { threshold: 0.1 });

    packageCards.forEach(card => observer.observe(card));

    document.querySelectorAll('.buy-btn').forEach(button => {
        button.addEventListener('click', event => {
            event.preventDefault();
            const card = button.closest('.package');
            if (!card) return;

            const packageTitle = card.querySelector('h3')?.textContent ?? 'Package';
            const packagePrice = card.querySelector('.price')?.textContent ?? '';
            alert(`Added to cart: ${packageTitle.trim()} ${packagePrice.trim()}`);
        });
    });

    const loginForm = document.querySelector('form');
    if (!loginForm) return;

    loginForm.addEventListener('submit', event => {
        event.preventDefault();
        alert('Login functionality would be implemented here.');
    });
});
