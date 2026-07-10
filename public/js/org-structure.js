function orgCounter() {
    return {
        started: false,
        counts: [
            { target: 2500, suffix: '+', display: '0' },
            { target: 45, suffix: '', display: '0' },
            { target: 6, suffix: '+', display: '0' },
            { target: 3, suffix: '', display: '0' }
        ],
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
                    this.counts[idx].display = value.toLocaleString() + stat.suffix;
                    if (progress < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            });
        }
    };
}
