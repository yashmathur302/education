/**
 * Read More / Read Less for testimonial cards.
 *
 * Expanding a card pauses the scrolling slider so the visitor can read it.
 * When the mouse leaves the slider, expanded cards close and the slider
 * moves again. On touch screens, tapping Read Less closes the card.
 */
export function initTestimonialSliders() {
    document.querySelectorAll('[data-testimonial-slider]').forEach((slider) => {
        const viewport = slider.querySelector('.testimonial-viewport');

        if (!viewport) {
            return;
        }

        showReadMoreOnlyWhenCut(viewport);
        // Line counts change once the web fonts finish loading, so check again then.
        document.fonts?.ready.then(() => showReadMoreOnlyWhenCut(viewport));
        window.addEventListener('resize', debounce(() => showReadMoreOnlyWhenCut(viewport), 200));

        const updatePause = () => {
            const hasExpandedCard = viewport.querySelector('[data-read-more][aria-expanded="true"]') !== null;
            viewport.classList.toggle('is-paused', hasExpandedCard);
        };

        viewport.addEventListener('click', (event) => {
            const button = event.target.closest('[data-read-more]');

            if (!button) {
                return;
            }

            setExpanded(button, button.getAttribute('aria-expanded') !== 'true');
            updatePause();
        });

        viewport.addEventListener('mouseleave', () => {
            viewport.querySelectorAll('[data-read-more][aria-expanded="true"]').forEach((button) => {
                setExpanded(button, false);
            });

            // A clicked button keeps focus, which would keep the slider paused.
            if (viewport.contains(document.activeElement)) {
                document.activeElement.blur();
            }

            updatePause();
        });
    });
}

/**
 * Hides Read More on cards whose quote already fits in three lines.
 */
function showReadMoreOnlyWhenCut(viewport) {
    viewport.querySelectorAll('[data-read-more][aria-expanded="false"]').forEach((button) => {
        const quote = document.getElementById(button.getAttribute('aria-controls'));

        button.hidden = !quote || quote.scrollHeight <= quote.clientHeight + 1;
    });
}

function debounce(callback, waitMs) {
    let timer;

    return () => {
        window.clearTimeout(timer);
        timer = window.setTimeout(callback, waitMs);
    };
}

function setExpanded(button, expanded) {
    const quote = document.getElementById(button.getAttribute('aria-controls'));

    quote?.classList.toggle('line-clamp-3', !expanded);
    button.setAttribute('aria-expanded', String(expanded));
    button.querySelector('[data-read-more-label]').textContent = expanded ? 'Read Less' : 'Read More';
    button.querySelector('[data-read-more-icon]').classList.toggle('rotate-90', expanded);
}
