/**
 * Keeps at most one <details> open inside each [data-accordion] group.
 * Modern browsers already do this through the shared "name" attribute;
 * this covers older browsers. Every item can still be closed.
 */
export function initAccordions() {
    document.querySelectorAll('[data-accordion]').forEach((group) => {
        const items = [...group.querySelectorAll('details')];

        items.forEach((item) => {
            item.addEventListener('toggle', () => {
                if (!item.open) {
                    return;
                }

                items.filter((other) => other !== item && other.open).forEach((other) => {
                    other.open = false;
                });
            });
        });
    });
}
