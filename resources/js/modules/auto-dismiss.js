const FADE_DURATION_MS = 300;

/**
 * Fades out and removes any element with a data-auto-dismiss attribute.
 * The attribute value is how long the element stays visible, in milliseconds.
 */
export function initAutoDismiss() {
    document.querySelectorAll('[data-auto-dismiss]').forEach((element) => {
        const visibleFor = Number(element.dataset.autoDismiss) || 5000;

        window.setTimeout(() => {
            element.style.transition = `opacity ${FADE_DURATION_MS}ms ease`;
            element.style.opacity = '0';
            window.setTimeout(() => element.remove(), FADE_DURATION_MS);
        }, visibleFor);
    });
}
