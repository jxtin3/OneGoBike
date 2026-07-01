<x-layout
    title="OneGoBike"
    description="Mobilizing volunteers, cyclists, responders, and local leaders to strengthen health, preparedness, and resilience across Pangasinan."
>


     <!-- SECTION 1 — HERO -->
<section
    id="hero"
    class="relative min-h-screen flex items-center overflow-hidden"
    aria-labelledby="hero-headline"
>
    <!-- Background image -->
    <div class="absolute inset-0 z-0">
        <img
            src="{{ asset('images/home1.jpg') }}"
            alt="Youth cyclists and volunteers riding through Pangasinan"
            class="w-full h-full object-cover object-center scale-[1.04] transition-transform duration-[12s] ease-out"
            fetchpriority="high"
            id="hero-bg-img"
        />
    </div>

    <!-- Directional overlay -->
    <div class="hero-overlay absolute inset-0 z-10"></div>

    <!-- Subtle grain -->
    <div class="absolute inset-0 z-10 opacity-[0.025] bg-noise" aria-hidden="true"></div>

    <!-- Bottom fade for smooth transition into next section -->
    <div class="absolute bottom-0 left-0 right-0 h-40 z-10 bg-gradient-to-t from-[#111827]/60 to-transparent" aria-hidden="true"></div>

    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 md:py-44 w-full">
        <div class="max-w-3xl">
<!-- 
            Legitimacy badge
            <div class="hero-accreditation mb-6 reveal">
                <span class="hero-accreditation-dot"></span>
                Youth-Led · Pangasinan · Est. 2019
                <span class="w-px h-3 bg-white/20 mx-1"></span>
                Accredited by DILG Region I
            </div> -->

            <!-- Main headline -->
            <h1
                id="hero-headline"
                class="text-hero-title font-heading font-bold text-white mb-5 reveal"
            >
                Youth-Led<br/>
                <span class="text-[#2FA7FF]">Community</span><br/>
                Responders
            </h1>

            <!-- Sub-headline -->
            <p class="text-base md:text-lg font-semibold text-white/75 mb-3 font-heading tracking-widest uppercase reveal">
                Building Healthier Communities Through Service
            </p>

            <!-- Body text -->
            <p class="text-base md:text-lg text-white/60 leading-relaxed mb-10 max-w-xl reveal">
                Mobilizing volunteers, cyclists, responders, and local leaders to strengthen health, preparedness, and resilience across Pangasinan.
            </p>

            <!-- CTAs -->
            <div class="flex flex-col sm:flex-row gap-4 mt-2 reveal">
                <a
                    href="{{ url('/programs') }}"
                    id="hero-cta-programs"
                    class="btn-wbr btn-wbr-orange"
                >
                    <span>Explore Programs</span>
                    <svg class="w-5 h-5 arrow" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </a>
                <a
                    href="{{ url('/about') }}"
                    id="hero-cta-about"
                    class="inline-flex items-center justify-center gap-2 px-10 py-4
                            border-2 border-white/35 hover:border-white/70
                            text-white text-sm font-bold tracking-[0.1em] uppercase
                            transition-all duration-300 backdrop-blur-sm
                            hover:bg-white/10"
                >
                    <span>Learn More</span>
                </a>
            </div>

        </div>
    </div>

    <!-- Scroll hint -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2 text-white/40 animate-bounce" aria-hidden="true">
        <span class="text-[10px] tracking-[0.22em] uppercase font-semibold">Scroll</span>
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
    </div>
</section>


<!-- Partners / Trust Bar -->
<div class="trust-bar py-4 overflow-hidden border-y border-white/10" aria-label="Government affiliations and partners">
    <div class="flex items-center gap-6 w-max affiliation-track cursor-pointer">
        @php
        $partners = [
            ['label' => 'DOH Pangasinan',   'abbr' => 'DOH'],
            ['label' => 'DILG Region I',     'abbr' => 'DILG'],
            ['label' => 'LGU Dagupan',       'abbr' => 'LGU'],
            ['label' => 'DSWD Pangasinan',   'abbr' => 'DSWD'],
            ['label' => 'DepEd Region I',    'abbr' => 'DepEd'],
            ['label' => 'NDRRMC',            'abbr' => 'NDRRMC'],
        ];
        $scrollPartners = array_merge($partners, $partners, $partners, $partners);
        @endphp
        
        @foreach ($scrollPartners as $p)
        <div class="trust-badge flex-shrink-0 px-4 py-2 bg-white/5 border border-white/10 rounded-sm flex items-center gap-2">
            <span class="text-xs font-bold tracking-[0.12em] uppercase text-white">{{ $p['abbr'] }}</span>
            <span class="text-xs text-white/50 font-medium">{{ $p['label'] }}</span>
        </div>
        @endforeach
    </div>
</div>

<!-- SECTION 2 — MANTRA & IMPACT STORIES -->
<section id="stories" class="bg-white" aria-labelledby="stories-heading">

    <!-- The Mantra -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32 text-center reveal">
        <span class="section-eyebrow mb-5 inline-flex">Our Belief</span>
        <h2 class="text-4xl md:text-6xl lg:text-7xl font-heading font-black text-[#111827] uppercase tracking-tighter leading-[1.08] mt-4">
            We Believe In The
            <br>
            <span class="mantra-box"><span id="mantra-word" class="mantra-flip-in">Power of Youth</span></span>
            <br>
            To Transform Communities.
        </h2>
        <p class="mt-8 text-[#64748B] text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
            From barangay to barangay, one bicycle at a time — we are building a generation of servant leaders committed to the Filipino community.
        </p>
    </div>

    <!-- Story Cards -->
    <div class="w-full flex flex-col gap-8 md:gap-14 pb-12">

        <!-- Story 1 -->
        <div class="relative flex flex-col md:flex-row items-stretch reveal">
            <div class="w-full md:w-[68%] relative h-[380px] md:h-[520px] overflow-hidden flex-shrink-0">
                <img
                    src="{{ asset('images/story-1.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105"
                    alt="Youth responders in action"
                    loading="lazy"
                />
                <!-- Image overlay for depth -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent to-[#1a1a1a]/30"></div>
            </div>
            <!-- Text panel -->
            <div class="story-card w-full md:w-[44%] md:-ml-16 bg-[#1a1a1a] p-10 md:p-12 lg:p-16 flex flex-col justify-center text-white z-10 self-center md:my-12">
                <div class="story-rule"></div>
                <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-[#F97316]/70 mb-3">Field Operations</span>
                <h3 class="text-3xl md:text-4xl font-heading font-bold uppercase mb-5 leading-tight tracking-tight">
                    Racing Against<br>The Clock
                </h3>
                <p class="text-white/65 text-sm md:text-base leading-relaxed mb-8 font-light">
                    In remote barangays, access to immediate care is limited. Our youth responders on bicycles bridge that gap, delivering first aid and critical supplies faster than traditional vehicles ever could.
                </p>
                <a href="{{ url('/programs') }}" class="text-sm font-semibold text-[#2FA7FF] hover:text-white transition-colors flex items-center gap-2 group">
                    Learn about the program
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Story 2 -->
        <div class="relative flex flex-col md:flex-row-reverse items-stretch reveal">
            <div class="w-full md:w-[68%] relative h-[380px] md:h-[550px] overflow-hidden flex-shrink-0">
                <img
                    src="{{ asset('images/impact-story.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105"
                    alt="Community empowerment"
                    loading="lazy"
                />
                <div class="absolute inset-0 bg-gradient-to-l from-transparent to-[#1a1a1a]/30"></div>
            </div>
            <!-- Text panel -->
            <div class="story-card w-full md:w-[44%] md:-mr-16 bg-[#1a1a1a] p-10 md:p-12 lg:p-16 flex flex-col justify-center text-white z-10 self-center md:my-12">
                <div class="story-rule"></div>
                <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-[#F97316]/70 mb-3">Youth Leadership</span>
                <h3 class="text-3xl md:text-4xl font-heading font-bold uppercase mb-5 leading-tight tracking-tight">
                    Empowering The<br>Next Generation
                </h3>
                <p class="text-white/65 text-sm md:text-base leading-relaxed mb-8 font-light">
                    Bicycles do more than transport; they unlock potential. We see young riders turning into community leaders, taking responsibility for the health and safety of their neighbors.
                </p>
                <div>
                    <a href="{{ url('/news') }}" class="btn-wbr">
                        <span>Read Their Stories</span>
                        <svg class="w-5 h-5 arrow" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>


     <!-- SECTION 3 — PROGRAMS SLIDER -->
<section
    id="programs"
    class="relative bg-[#111827]"
    aria-labelledby="programs-heading"
    x-data="programSlider()"
>
    <!-- Header Bar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-4 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
        <div>
            <span class="section-eyebrow mb-2 inline-flex">Our Programs</span>
            <h2 id="programs-heading" class="text-4xl md:text-5xl font-heading font-bold text-white uppercase tracking-tight mt-2">
                What We Do
            </h2>
        </div>
        <a href="{{ url('/programs') }}" class="text-sm font-bold text-white/70 hover:text-white transition-colors flex items-center gap-2 pb-1 tracking-wide group">
            View All Programs
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
        </a>
    </div>

    <!-- Slider -->
    <div
        class="relative w-full overflow-hidden bg-[#111827] min-h-[580px] md:min-h-[640px]"
        @mouseenter="pause()"
        @mouseleave="resume()"
    >
        <!-- Background slides -->
        <template x-for="(prog, index) in programs" :key="index">
            <div
                x-show="active === index"
                x-transition:enter="transition-opacity duration-1000 z-10"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-1000 z-0"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 w-full h-full"
            >
                <img :src="prog.img" :alt="prog.title"
                     class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10s] ease-out"
                     :class="active === index ? 'scale-105' : 'scale-100'">
                <!-- Rich overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#111827] via-[#111827]/50 to-transparent opacity-80"></div>
                <div class="absolute inset-0" :style="'background: radial-gradient(ellipse at 80% 20%, ' + prog.accent + '18 0%, transparent 60%)'"></div>
            </div>
        </template>

        <!-- Content Area -->
        <div class="absolute inset-0 z-20 flex items-end pb-20 px-4 sm:px-8 lg:px-16">
            <div class="w-full max-w-4xl relative h-auto">
                <template x-for="(prog, index) in programs" :key="'c' + index">
                    <div
                        x-show="active === index"
                        x-transition:enter="transition ease-out duration-700 delay-200 z-10 relative"
                        x-transition:enter-start="opacity-0 translate-y-6"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300 absolute inset-0 z-0"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="w-full"
                    >
                        <h3 class="text-3xl sm:text-4xl md:text-5xl font-heading font-bold text-white mb-4 uppercase tracking-wider drop-shadow-md" x-text="prog.title"></h3>
                        <p class="text-white/80 text-sm md:text-base font-light mb-8 max-w-xl leading-relaxed drop-shadow-sm" x-text="prog.desc"></p>
                        <a
                            :href="prog.href"
                            class="inline-flex items-center justify-center gap-2 px-6 py-2.5 text-xs font-bold text-white border border-white/30 hover:bg-white hover:text-[#111827] transition-all duration-300 tracking-widest uppercase rounded-sm"
                        >
                            Learn More
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </template>
            </div>
        </div>

        <!-- Navigation controls -->
        <div class="absolute right-6 bottom-8 z-30 flex items-center gap-3">
            <button
                @click="prev()"
                class="w-9 h-9 rounded-sm border border-white/20 text-white/60 hover:bg-white/10 hover:text-white transition-all flex items-center justify-center"
                aria-label="Previous program"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/></svg>
            </button>
            <div class="flex gap-2">
                <template x-for="(prog, index) in programs" :key="'d' + index">
                    <button
                        @click="goTo(index)"
                        class="h-1.5 rounded-full transition-all duration-300"
                        :class="active === index ? 'w-7 bg-[#F97316]' : 'w-1.5 bg-white/35 hover:bg-white/60'"
                        :aria-label="'Go to slide ' + (index + 1)"
                    ></button>
                </template>
            </div>
            <button
                @click="next()"
                class="w-9 h-9 rounded-sm border border-white/20 text-white/60 hover:bg-white/10 hover:text-white transition-all flex items-center justify-center"
                aria-label="Next program"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            </button>
        </div>
    </div>

    </div>
</section>

<!-- SECTION 4 — QUICK ACCESS CARDS -->
 
<section
    id="quick-access"
    class="py-20 md:py-24 bg-[#F8FAFC]"
    aria-labelledby="quick-access-heading"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-14 reveal">
            <span class="section-eyebrow mb-4 inline-flex">Navigation</span>
            <h2 id="quick-access-heading" class="text-section-title-md font-heading font-bold text-[#111827] mt-3">
                Find What You Need
            </h2>
            <p class="text-[#64748B] mt-3 max-w-md mx-auto text-sm leading-relaxed">
                Quickly navigate to our key services and programs designed to serve the Pangasinan community.
            </p>
        </div>

        @php
        $quickLinks = [
            [
                'icon'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>',
                'bg'     => 'from-[#132D6B] to-[#1a3d8a]',
                'accent' => '#132D6B',
                'title'  => 'Programs',
                'desc'   => 'Explore health, outreach, and disaster readiness initiatives.',
                'href'   => '/programs',
                'tag'    => 'Community Service',
            ],
            [
                'icon'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>',
                'bg'     => 'from-[#F97316] to-[#fb923c]',
                'accent' => '#F97316',
                'title'  => 'Volunteer',
                'desc'   => 'Join our growing team of youth community responders.',
                'href'   => '/volunteer',
                'tag'    => 'Get Involved',
            ],
            [
                'icon'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/>',
                'bg'     => 'from-[#2FA7FF] to-[#60c0ff]',
                'accent' => '#2FA7FF',
                'title'  => 'News & Updates',
                'desc'   => 'Stay informed on our latest field operations and news.',
                'href'   => '/news',
                'tag'    => 'Latest Updates',
            ],
            [
                'icon'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>',
                'bg'     => 'from-[#16A34A] to-[#22c55e]',
                'accent' => '#16A34A',
                'title'  => 'Contact Us',
                'desc'   => 'Reach our team for partnerships, media, or inquiries.',
                'href'   => '/contact',
                'tag'    => 'Get in Touch',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($quickLinks as $i => $link)
            <a
                href="{{ url($link['href']) }}"
                id="quick-link-{{ $i }}"
                class="quick-card group flex flex-col gap-4 p-6 reveal reveal-delay-{{ $i + 1 }}"
                style="--card-accent: {{ $link['accent'] }}"
                aria-label="{{ $link['title'] }}"
            >
                <!-- Icon -->
                <div class="w-12 h-12 rounded-sm bg-gradient-to-br {{ $link['bg'] }} flex items-center justify-center shadow-md
                            transition-transform duration-300 group-hover:scale-105">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        {!! $link['icon'] !!}
                    </svg>
                </div>

                <!-- Tag -->
                <span class="text-[9px] font-bold tracking-[0.18em] uppercase" style="color: {{ $link['accent'] }}">{{ $link['tag'] }}</span>

                <div>
                    <h3 class="font-heading font-semibold text-[#111827] text-lg mb-1.5 group-hover:text-[#132D6B] transition-colors duration-200">
                        {{ $link['title'] }}
                    </h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">{{ $link['desc'] }}</p>
                </div>

                <div class="flex items-center gap-1.5 text-xs font-bold mt-auto transition-colors duration-200"
                     style="color: {{ $link['accent'] }}">
                    Explore
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>


<!-- 
     SECTION 5 — FEATURED IMPACT -->
   
<section
    id="featured-impact"
    class="py-20 md:py-28 bg-white overflow-hidden"
    aria-labelledby="impact-story-heading"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            <!-- Left: Image -->
            <div class="relative reveal">
                <div class="relative rounded-sm overflow-hidden shadow-lg aspect-[4/3]">
                    <img
                        src="{{ asset('images/impact-story.jpg') }}"
                        alt="Community gathering around bicycles at sunset"
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-[1.04]"
                        loading="lazy"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0D1B2A]/50 to-transparent"></div>
                </div>

                <!-- Floating stat badge -->
                <div class="absolute -bottom-6 -right-4 sm:-right-6 bg-[#132D6B] text-white rounded-sm px-6 py-5 shadow-xl hidden sm:block">
                    <div class="font-heading font-bold text-3xl tracking-tight">500+</div>
                    <div class="text-[10px] text-white/55 uppercase tracking-[0.18em] mt-0.5">Families Reached</div>
                </div>

                <!-- Decorative dot grid -->
                <div class="dot-grid absolute -top-6 -left-6 w-24 h-24 opacity-25" aria-hidden="true"></div>

                <!-- Orange accent bar -->
                <div class="absolute top-0 left-0 w-1 h-20 bg-gradient-to-b from-[#F97316] to-transparent"></div>
            </div>

            <!-- Right: Story -->
            <div class="flex flex-col gap-7 reveal">
                <div>
                    <span class="section-eyebrow mb-4 inline-flex">Impact Story</span>
                    <h2
                        id="impact-story-heading"
                        class="text-impact-title font-heading font-bold text-[#111827] leading-tight mb-4 mt-3"
                    >
                        Every Ride Creates<br/>
                        <span class="text-[#132D6B]">Community Impact</span>
                    </h2>
                    <p class="text-[#64748B] leading-relaxed text-base">
                        In 2024, our volunteer cyclists logged over 18,000 hours responding to community needs across 45 barangays. Each ride represents a connection — a health check delivered, a family reached, a community made more resilient.
                    </p>
                </div>

                <!-- Impact highlights -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @php
                    $highlights = [
                        ['value' => '300+',   'label' => 'Medical Missions Conducted', 'bg' => 'bg-[#16A34A]', 'text' => 'text-[#16A34A]'],
                        ['value' => '12,000', 'label' => 'Beneficiaries Served',        'bg' => 'bg-[#2FA7FF]', 'text' => 'text-[#2FA7FF]'],
                        ['value' => '45',     'label' => 'Barangays Reached',            'bg' => 'bg-[#F97316]', 'text' => 'text-[#F97316]'],
                        ['value' => '85%',    'label' => 'Youth-Led Initiatives',        'bg' => 'bg-[#132D6B]', 'text' => 'text-[#132D6B]'],
                    ];
                    @endphp
                    @foreach ($highlights as $h)
                    <div class="impact-stat-card">
                        <div class="w-1 self-stretch rounded-full shrink-0 {{ $h['bg'] }}"></div>
                        <div>
                            <div class="font-heading font-bold text-xl {{ $h['text'] }}">{{ $h['value'] }}</div>
                            <div class="text-xs text-[#64748B] leading-snug mt-0.5">{{ $h['label'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 mt-1">
                    <a
                        href="{{ url('/about') }}"
                        class="inline-flex items-center justify-center gap-2 px-7 py-3.5 text-sm font-semibold bg-[#132D6B] text-white hover:bg-[#2FA7FF] transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5 rounded-sm"
                    >
                        Our Full Story
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <a
                        href="{{ url('/donate') }}"
                        class="inline-flex items-center justify-center gap-2 px-7 py-3.5 text-sm font-semibold bg-white text-[#132D6B] border border-[#132D6B]/30 hover:bg-[#132D6B] hover:text-white transition-all duration-300 shadow-sm rounded-sm"
                    >
                        Support Our Rides
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- SECTION 6 — IMPACT STATISTICS STRIP -->
<section
    id="impact"
    class="bg-[#0D1B2A] relative overflow-hidden"
    aria-label="Impact statistics"
    x-data="counterSection()"
    x-intersect.once="startCounters()"
>
    <!-- Decorative background glow -->
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full bg-[#2FA7FF]/5 blur-3xl pointer-events-none" aria-hidden="true"></div>
    <div class="absolute bottom-0 right-1/4 w-64 h-64 rounded-full bg-[#F97316]/5 blur-3xl pointer-events-none" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4">

            <!-- Stat 1 -->
            <div class="stat-item flex flex-col items-center justify-center p-8 relative">
                <span class="text-stat font-heading font-bold text-white mb-2" x-text="counts[0].display">0</span>
                <span class="text-[#2FA7FF] font-bold text-xs tracking-widest uppercase">Trained Youth Volunteers</span>
            </div>

            <!-- Stat 2 -->
            <div class="stat-item flex flex-col items-center justify-center p-8 relative">
                <span class="text-stat font-heading font-bold text-white mb-2" x-text="counts[1].display">0</span>
                <span class="text-[#2FA7FF] font-bold text-xs tracking-widest uppercase">Barangays Served</span>
            </div>

            <!-- Stat 3 -->
            <div class="stat-item flex flex-col items-center justify-center p-8 relative">
                <span class="text-stat font-heading font-bold text-white mb-2" x-text="counts[2].display">0</span>
                <span class="text-[#2FA7FF] font-bold text-xs tracking-widest uppercase">Volunteer Hours</span>
            </div>

            <!-- Stat 4 -->
            <div class="stat-item flex flex-col items-center justify-center p-8 relative">
                <span class="text-stat font-heading font-bold text-white mb-2" x-text="counts[3].display">2019</span>
                <span class="text-[#2FA7FF] font-bold text-xs tracking-widest uppercase">Active Since</span>
            </div>

        </div>
    </div>
</section>


<!-- SECTION 7 — CALL TO ACTION -->
<section
    id="cta"
    class="relative py-28 md:py-25 overflow-hidden"
    aria-labelledby="cta-heading"
>
    <!-- Background Map -->
    <div class="absolute inset-0 z-0 bg-[#F8FAFC]">
        <img src="{{ asset('images/pangasinan map.png') }}" alt="Map of Pangasinan" class="w-full h-full object-cover opacity-[0.15] mix-blend-multiply scale-105">
        <!-- Light overlay to fade and ensure text remains readable -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#F8FAFC] via-white/70 to-[#F8FAFC]"></div>
    </div>

    <!-- Grid pattern overlay (inverted for light theme) -->
    <div class="cta-grid-pattern absolute inset-0 opacity-30" aria-hidden="true" style="filter: invert(1);"></div>

    <!-- Glowing blobs (softened for light theme) -->
    <div class="cta-blob-blue absolute top-0 left-0 w-96 h-96 rounded-full blur-3xl opacity-30" aria-hidden="true"></div>
    <div class="cta-blob-orange absolute bottom-0 right-0 w-80 h-80 rounded-full blur-3xl opacity-20" aria-hidden="true"></div>

    <!-- Philippine-inspired subtle accent lines -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#2FA7FF]/40 to-transparent" aria-hidden="true"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#F97316]/30 to-transparent" aria-hidden="true"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">

        <span class="inline-flex items-center gap-2 text-[10px] font-semibold tracking-[0.22em] uppercase text-[#F97316] mb-5">
            Get Involved
        </span>

        <h2
            id="cta-heading"
            class="text-cta-title font-heading font-bold text-[#111827] mb-6 leading-tight"
        >
            Ready To Make<br/>
            An <span class="text-[#2FA7FF]">Impact?</span>
        </h2>

        <p class="text-base md:text-lg text-[#64748B] font-medium leading-relaxed mb-10 max-w-2xl mx-auto">
            Join volunteers, partners, and community leaders creating meaningful change throughout Pangasinan. Every contribution — time, skills, or resources — helps build a stronger community.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-6">
            <a
                href="{{ url('/volunteer') }}"
                id="cta-volunteer"
                class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#132D6B] text-white text-sm font-bold tracking-[0.1em] uppercase transition-all duration-300 shadow-lg shadow-[#132D6B]/30 hover:bg-[#2FA7FF] hover:-translate-y-1 rounded-sm"
            >
                <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                <span>Volunteer With Us</span>
            </a>
            <a
                href="{{ url('/donate') }}"
                id="cta-donate"
                class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-[#F97316] border border-[#F97316]/30 text-sm font-bold tracking-[0.1em] uppercase transition-all duration-300 shadow-sm hover:border-[#F97316] hover:bg-[#F97316]/5 hover:-translate-y-1 rounded-sm"
            >
                <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                <span>Donate Now</span>
            </a>
        </div>

        <!-- Micro trust signal -->
        <!-- <p class="mt-10 text-[11px] text-white/30 tracking-wide">
            Registered Non-Profit Organization · DILG Accredited · Pangasinan, Philippines
        </p> -->

    </div>
</section>


<x-slot:scripts>
<script src="{{ asset('js/home.js') }}"></script>
</x-slot:scripts>

</x-layout>
