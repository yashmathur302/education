// Effect: card lift and tilt. Only for a mouse or trackpad, never for reduced motion.
const ENABLED_QUERY = '(hover: hover) and (pointer: fine) and (prefers-reduced-motion: no-preference)';
const MAX_TILT_DEG = 5;

/**
 * Tilts [data-tilt] cards gently towards the pointer while it is over them.
 * The lift and shadow come from CSS (:hover); this only sets the two angles.
 */
export function initCardTilt() {
    if (!window.matchMedia(ENABLED_QUERY).matches) {
        return;
    }

    document.querySelectorAll('[data-tilt]').forEach((card) => {
        card.addEventListener('pointermove', (event) => {
            const rect = card.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width - 0.5;
            const y = (event.clientY - rect.top) / rect.height - 0.5;

            card.style.setProperty('--tilt-x', `${(-y * MAX_TILT_DEG).toFixed(2)}deg`);
            card.style.setProperty('--tilt-y', `${(x * MAX_TILT_DEG).toFixed(2)}deg`);
        });

        card.addEventListener('pointerleave', () => {
            card.style.removeProperty('--tilt-x');
            card.style.removeProperty('--tilt-y');
        });
    });
}
