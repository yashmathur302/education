const DESKTOP_QUERY = '(width >= 64rem)';

/**
 * Toggles the full-height navigation panel on phones and tablets.
 * While the panel is open the page behind it cannot scroll, and
 * aria-expanded stays in sync for screen readers.
 */
export function initMobileMenu() {
    const toggle = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-menu]');

    if (!toggle || !menu) {
        return;
    }

    const isOpen = () => toggle.getAttribute('aria-expanded') === 'true';

    const setOpen = (open) => {
        menu.classList.toggle('hidden', !open);
        document.body.classList.toggle('overflow-hidden', open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    };

    toggle.addEventListener('click', () => {
        if (!isOpen()) {
            window.scrollTo({ top: 0 });
        }

        setOpen(!isOpen());
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && isOpen()) {
            setOpen(false);
        }
    });

    window.matchMedia(DESKTOP_QUERY).addEventListener('change', (event) => {
        if (event.matches && isOpen()) {
            setOpen(false);
        }
    });
}
