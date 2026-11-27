// Effect: parallax. Desktop only, and never for visitors who prefer reduced motion.
const ENABLED_QUERY = '(min-width: 64rem) and (prefers-reduced-motion: no-preference)';
const MAX_SHIFT_PX = 60;

/**
 * Elements with data-parallax="0.2" drift at a slightly different speed from
 * the page while scrolling, which adds depth. The number is how strongly they
 * lag: 0.1 is subtle, 0.4 is clearly noticeable.
 *
 * Only elements on screen are updated, once per frame, using the CSS
 * "translate" property so it never fights with entrance or hover animations.
 */
export function initParallax() {
    const elements = [...document.querySelectorAll('[data-parallax]')];
    const media = window.matchMedia(ENABLED_QUERY);

    if (elements.length === 0) {
        return;
    }

    const onScreen = new Set();
    let frameQueued = false;

    const update = () => {
        frameQueued = false;
        const viewportCenter = window.innerHeight / 2;

        onScreen.forEach((element) => {
            const speed = Number(element.dataset.parallax) || 0;
            const currentShift = Number(element.dataset.parallaxShift) || 0;
            const rect = element.getBoundingClientRect();
            const restingCenter = rect.top - currentShift + rect.height / 2;
            const shift = Math.max(-MAX_SHIFT_PX, Math.min(MAX_SHIFT_PX, (viewportCenter - restingCenter) * speed));

            element.dataset.parallaxShift = String(shift);
            element.style.translate = `0 ${shift.toFixed(1)}px`;
        });
    };

    const requestUpdate = () => {
        if (!frameQueued) {
            frameQueued = true;
            window.requestAnimationFrame(update);
        }
    };

    const visibility = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                onScreen.add(entry.target);
            } else {
                onScreen.delete(entry.target);
            }
        });
        requestUpdate();
    });

    const start = () => {
        elements.forEach((element) => visibility.observe(element));
        window.addEventListener('scroll', requestUpdate, { passive: true });
        window.addEventListener('resize', requestUpdate, { passive: true });
    };

    const stop = () => {
        visibility.disconnect();
        onScreen.clear();
        window.removeEventListener('scroll', requestUpdate);
        window.removeEventListener('resize', requestUpdate);
        elements.forEach((element) => {
            element.style.translate = '';
            delete element.dataset.parallaxShift;
        });
    };

    media.addEventListener('change', (event) => (event.matches ? start() : stop()));

    if (media.matches) {
        start();
    }
}
