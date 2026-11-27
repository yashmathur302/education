// Effect: reading progress bar on blog posts.

/**
 * Fills the [data-reading-progress] bar from 0 to 100% as the reader scrolls
 * from the top of the article to its end. Updates at most once per frame and
 * only moves the bar with "transform", which is cheap for the browser.
 */
export function initReadingProgress() {
    const fill = document.querySelector('[data-reading-progress]');
    const article = fill?.closest('article');

    if (!fill || !article) {
        return;
    }

    let frameQueued = false;

    const update = () => {
        frameQueued = false;
        const rect = article.getBoundingClientRect();
        const readableDistance = rect.height - window.innerHeight;
        const progress = readableDistance > 0 ? Math.min(Math.max(-rect.top / readableDistance, 0), 1) : 1;

        fill.style.transform = `scaleX(${progress.toFixed(3)})`;
    };

    const requestUpdate = () => {
        if (!frameQueued) {
            frameQueued = true;
            window.requestAnimationFrame(update);
        }
    };

    window.addEventListener('scroll', requestUpdate, { passive: true });
    window.addEventListener('resize', requestUpdate, { passive: true });
    update();
}
