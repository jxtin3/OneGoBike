// Shared counter animation used by home.js and org-structure.js
function createCounterAnimation(counts) {
    return {
        started: false,
        counts: counts,
        startCounters() {
            if (this.started) return;
            this.started = true;

            this.counts.forEach((stat, idx) => {
                const duration = 3000;
                const startTime = performance.now();

                const easeOut = t => 1 - Math.pow(1 - t, 3);

                const step = (now) => {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const value = Math.round(easeOut(progress) * stat.target);
                    const formattedValue = stat.raw ? value.toString() : value.toLocaleString();
                    this.counts[idx].display = formattedValue + (stat.suffix || '');
                    if (progress < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            });
        }
    };
}