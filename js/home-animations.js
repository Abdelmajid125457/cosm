/**
 * Animations légères de la page d'accueil.
 */

document.addEventListener('DOMContentLoaded', () => {
    const heroMedia = document.querySelector('.hero-media');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!heroMedia || prefersReducedMotion) {
        return;
    }

    let ticking = false;

    const updateHero = () => {
        const offset = Math.min(window.scrollY * 0.12, 80);
        heroMedia.style.transform = `scale(1.04) translateY(${offset}px)`;
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(updateHero);
            ticking = true;
        }
    }, { passive: true });
});
