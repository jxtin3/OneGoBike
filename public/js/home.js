
//  Mantra word flipper (bottom-to-top rectangle flip) 
(function () {
    const words = ['Power of Youth', 'Community Action', 'Local Leadership', 'Collective Purpose'];
    let index = 0;

    function flipWord() {
        const el = document.getElementById('mantra-word');
        if (!el) return;

        el.classList.remove('mantra-flip-in');
        el.classList.add('mantra-flip-out');

        setTimeout(() => {
            index = (index + 1) % words.length;
            el.textContent = words[index];

            el.classList.remove('mantra-flip-out');
            void el.offsetWidth;
            el.classList.add('mantra-flip-in');
        }, 250);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const el = document.getElementById('mantra-word');
        if (el) setInterval(flipWord, 2800);
    });
})();

// Alpine counter component script
function counterSection() {
    return {
        started: false,
        // NOTE: Change target numbers here
        counts: [
            { target: 2500, suffix: '+', display: '0+' },
            { target: 45, suffix: '', display: '0' },
            { target: 18000, suffix: '+', display: '0+' },
            { target: 2019, suffix: '', display: '2019' },
        ],
        startCounters() {
            if (this.started) return;
            this.started = true;

            this.counts.forEach((stat, idx) => {
                if (idx === 3) return; // "Active Since" — static

                const duration = 2000;
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

// Alpine program slider component script
function programSlider() {
    return {
        active: 0,
        interval: null,
        intervalMs: 4000,
        progress: 0,
        progressInterval: null,
        programs: [
            {
                img: '/images/prog-1.jpg',
                accent: '#F97316',
                title: 'Go Bike',
                desc: 'Promoting health, mobility, and sustainable livelihoods on two wheels.',
                href: '/programs/health'
            },
            {
                img: '/images/story-2.jpg',
                accent: '#2FA7FF',
                title: 'Community Outreach',
                desc: 'Engaging local communities through livelihood programs, nutrition drives, and educational workshops that build long-term capacity and self-reliance.',
                href: '/programs/outreach'
            },
            {
                img: '/images/story-3.jpg',
                accent: '#F97316',
                title: 'Volunteer Mobilization',
                desc: 'Recruiting, training, and deploying youth cyclists as community responders — building a network ready to act during emergencies and routine service.',
                href: '/programs/volunteer'
            },
            {
                img: '/images/hero-home.jpg',
                accent: '#132D6B',
                title: 'Disaster Preparedness',
                desc: 'Equipping communities with the knowledge, tools, and confidence to prepare for, respond to, and recover from natural disasters — before they strike.',
                href: '/programs/disaster'
            }
        ],
        init() {
            this.start();
        },
        start() {
            this.resetProgress();
            this.interval = setInterval(() => {
                this.next();
            }, this.intervalMs);
        },
        pause() {
            clearInterval(this.interval);
            clearInterval(this.progressInterval);
        },
        resume() {
            this.start();
        },
        next() {
            this.active = (this.active + 1) % this.programs.length;
            this.resetProgress();
        },
        prev() {
            this.active = (this.active - 1 + this.programs.length) % this.programs.length;
            this.resetProgress();
        },
        goTo(index) {
            this.active = index;
            this.resetProgress();
            clearInterval(this.interval);
            this.start();
        },
        resetProgress() {
            clearInterval(this.progressInterval);
            this.progress = 0;
            // wait a tick so DOM updates 0%
            setTimeout(() => {
                this.progress = 100;
            }, 50);
        }
    }
}
