const DURATION_MS = 2000;
const VISIBLE_SHARE = 0.4;

/**
 * Counts numbers up from zero when their group scrolls into view.
 *
 * Every counter in a group takes the same time (DURATION_MS), so small and
 * large numbers finish together. The count eases out, slowing near the end,
 * and always lands exactly on the target. Each group animates only once.
 * Visitors who prefer reduced motion see the final numbers straight away.
 */
export function initCounters() {
    const groups = document.querySelectorAll('[data-counters]');

    if (groups.length === 0 || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                observer.unobserve(entry.target);
                entry.target.querySelectorAll('[data-counter-target]').forEach(countUp);
            });
        },
        { threshold: VISIBLE_SHARE },
    );

    groups.forEach((group) => {
        group.querySelectorAll('[data-counter-target]').forEach((element) => {
            element.textContent = '0';
        });
        observer.observe(group);
    });
}

function countUp(element) {
    const target = Number(element.dataset.counterTarget);
    const formatter = new Intl.NumberFormat('en-IN');
    const startedAt = performance.now();

    const step = (now) => {
        const progress = Math.min((now - startedAt) / DURATION_MS, 1);
        const easedProgress = 1 - (1 - progress) ** 3;

        element.textContent = formatter.format(Math.round(target * easedProgress));

        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };

    window.requestAnimationFrame(step);
}
