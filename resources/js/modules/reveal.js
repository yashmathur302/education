// Reveal as soon as any part is on screen, once it is 60px above the bottom edge.
const TRIGGER_MARGIN = '0px 0px -60px 0px';

/**
 * Plays each [data-animate] element's entrance animation once, when it
 * first scrolls into view. The animation itself is defined in app.css.
 *
 * Optional data-animate-delay="300" waits that many milliseconds, which is
 * how items in a row appear one after another.
 *
 * Anything already above the screen (a fast scroll that skipped past it,
 * or a page reopened halfway down) is revealed too, so nothing stays hidden.
 *
 * Marks <html> with "animations-ready" so the fallback timer in the layout
 * knows this script is running and does not reveal everything early.
 */
export function initReveal() {
    document.documentElement.classList.add('animations-ready');

    const waiting = new Set(document.querySelectorAll('[data-animate]'));

    if (waiting.size === 0) {
        return;
    }

    const reveal = (element) => {
        if (!waiting.delete(element)) {
            return;
        }

        element.style.animationDelay = `${Number(element.dataset.animateDelay) || 0}ms`;
        element.classList.add('is-visible');

        // Once finished, drop the entrance animation (it already ended at rest)
        // so hover effects such as the card tilt can move the element freely.
        // Animations of child elements bubble up here too, so wait for our own.
        const settle = (event) => {
            if (event.target === element) {
                element.classList.add('is-settled');
                element.removeEventListener('animationend', settle);
            }
        };
        element.addEventListener('animationend', settle);
        observer.unobserve(element);

        if (waiting.size === 0) {
            window.removeEventListener('scroll', onScroll);
        }
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting || entry.boundingClientRect.bottom < 0) {
                    reveal(entry.target);
                }
            });
        },
        { rootMargin: TRIGGER_MARGIN },
    );

    let checkQueued = false;

    const revealPassedElements = () => {
        checkQueued = false;
        waiting.forEach((element) => {
            if (element.getBoundingClientRect().bottom < 0) {
                reveal(element);
            }
        });
    };

    function onScroll() {
        if (!checkQueued) {
            checkQueued = true;
            window.requestAnimationFrame(revealPassedElements);
        }
    }

    waiting.forEach((element) => observer.observe(element));
    window.addEventListener('scroll', onScroll, { passive: true });
}
