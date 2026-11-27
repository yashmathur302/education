const DURATION_MS = 350;
const EASING = 'cubic-bezier(0.25, 0.8, 0.25, 1)';

/**
 * Smooth one-at-a-time accordions for [data-accordion] groups of <details>.
 *
 * Opening a question slides its answer down; any other open question in
 * the group slides shut at the same time. Clicking an open question slides
 * it shut, so every question can be closed.
 *
 * Without JavaScript the shared "name" attribute still keeps one answer open
 * at a time (just without the slide). With JavaScript we remove it and handle
 * that ourselves, because the browser would otherwise snap the others shut.
 * Visitors who prefer reduced motion get the instant open and close.
 */
export function initAccordions() {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('[data-accordion]').forEach((group) => {
        const items = [...group.querySelectorAll('details')];

        items.forEach((item) => {
            item.removeAttribute('name');

            item.querySelector('summary').addEventListener('click', (event) => {
                event.preventDefault();

                if (item.open) {
                    close(item, reduceMotion);
                    return;
                }

                items.filter((other) => other !== item && other.open).forEach((other) => close(other, reduceMotion));
                open(item, reduceMotion);
            });
        });
    });
}

function open(item, reduceMotion) {
    if (reduceMotion) {
        item.open = true;
        return;
    }

    const startHeight = item.offsetHeight;
    item.open = true;
    const endHeight = item.scrollHeight;

    slide(item, startHeight, endHeight);
}

function close(item, reduceMotion) {
    if (reduceMotion) {
        item.open = false;
        return;
    }

    const startHeight = item.offsetHeight;
    const endHeight = item.querySelector('summary').offsetHeight;

    slide(item, startHeight, endHeight).onfinish = () => {
        item.open = false;
    };
}

/**
 * Animates the <details> height between two values, hiding overflow while it
 * moves. Any slide already running on the item is replaced.
 */
function slide(item, startHeight, endHeight) {
    item.slideAnimation?.cancel();
    item.style.overflow = 'hidden';

    const animation = item.animate(
        { height: [`${startHeight}px`, `${endHeight}px`] },
        { duration: DURATION_MS, easing: EASING },
    );

    animation.addEventListener('finish', () => {
        item.style.overflow = '';
        item.slideAnimation = null;
    });

    item.slideAnimation = animation;

    return animation;
}
