const SHOW_AFTER_PX = 400;

/**
 * Shows the back-to-top button once the visitor has scrolled down
 * and scrolls smoothly to the top when it is clicked.
 */
export function initBackToTop() {
    const button = document.querySelector('[data-back-to-top]');

    if (!button) {
        return;
    }

    let isVisible = false;

    const updateVisibility = () => {
        const shouldShow = window.scrollY > SHOW_AFTER_PX;

        if (shouldShow === isVisible) {
            return;
        }

        isVisible = shouldShow;
        button.classList.toggle('opacity-0', !isVisible);
        button.classList.toggle('pointer-events-none', !isVisible);
    };

    window.addEventListener('scroll', updateVisibility, { passive: true });
    updateVisibility();

    button.addEventListener('click', () => {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    });
}
