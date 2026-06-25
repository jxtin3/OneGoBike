<x-layout
    title="OneGoBike"
    description="Mobilizing volunteers, cyclists, responders, and local leaders to strengthen health, preparedness, and resilience across Pangasinan."
>

     <!--  SECTION 1 HERO -->
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
            class="w-full h-full object-cover object-center"
            fetchpriority="high"
        />
    </div>

    <!-- Directional overlay -->
    <div class="hero-overlay absolute inset-0 z-10"></div>

    <!-- Subtle animated noise grain overlay -->
    <div class="absolute inset-0 z-10 opacity-[0.03] bg-noise"></div>

    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 md:py-40 w-full">
        <div class="max-w-3xl">

            <!-- Eyebrow tag -->
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-sm bg-[#2FA7FF]/15 border border-[#2FA7FF]/30 mb-6"
                 x-data x-intersect.once="$el.classList.add('animate-[fadeInUp_0.5s_ease_forwards]')">
                <span class="w-2 h-2 rounded-full bg-[#2FA7FF] animate-pulse"></span>
                <span class="text-xs font-semibold tracking-widest uppercase text-[#2FA7FF]">Pangasinan, Philippines</span>
            </div>

             <!-- Main headline  -->
            <h1
                id="hero-headline"
                class="text-hero-title font-heading font-bold text-white mb-6"
            >
                Youth-Led<br/>
                <span class="text-[#2FA7FF]">Community</span><br/>
                Responders
            </h1>

             <!-- Sub-headline -->
            <p class="text-lg md:text-xl font-semibold text-white/80 mb-3 font-heading tracking-wide">
                Building Healthier Communities Through Service
            </p>

             <!-- Body text  -->
            <p class="text-base md:text-lg text-white/65 leading-relaxed mb-10 max-w-xl">
                Mobilizing volunteers, cyclists, responders, and local leaders to strengthen health, preparedness, and resilience across Pangasinan.
            </p>

             <!-- CTAs -->
            <div class="flex flex-col sm:flex-row gap-4 mt-4">
                <a
                    href="{{ url('/programs') }}"
                    id="hero-cta-programs"
                    class="btn-wbr"
                >
                    <span>Explore Programs</span>
                    <svg class="w-5 h-5 arrow" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </a>
                <a
                    href="{{ url('/about') }}"
                    id="hero-cta-about"
                    class="btn-wbr btn-wbr-light backdrop-blur-sm"
                >
                    <span>Learn More</span>
                </a>
            </div>

        </div>
    </div>

     <!-- Scroll hint -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2 text-white/40 animate-bounce" aria-hidden="true">
        <span class="text-xs tracking-widest uppercase">Scroll</span>
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
    </div>
</section>




<!-- SECTION 3 MANTRA & IMPACT STORIES (WBR Style) -->
<section id="stories" class="bg-white" aria-labelledby="stories-heading">
    
    <!-- The Mantra -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32 text-center reveal">
        <h2 class="text-4xl md:text-6xl lg:text-7xl font-heading font-black text-[#111827] uppercase tracking-tighter leading-[1.1]">
            We Believe In The <span class="text-[#F97316]">Power of Youth</span> To Transform Communities.
        </h2>
    </div>

    <!-- 2 "Video" style rows: 50% image, 50% text -->
    <div class="w-full flex flex-col">
        <!-- Story 1 -->
        <div class="flex flex-col md:flex-row w-full reveal">
            <!-- Image side -->
            <div class="w-full md:w-1/2 relative h-[400px] md:h-[600px] overflow-hidden group">
                <img src="{{ asset('images/story-1.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Youth responders in action">
                <!-- Play button overlay -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <button class="w-20 h-20 bg-white/20 hover:bg-[#F97316] backdrop-blur-sm rounded-full flex items-center justify-center transition-all group-hover:scale-110 duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>
                </div>
            </div>
            <!-- Text side -->
            <div class="w-full md:w-1/2 bg-[#1a1a1a] p-10 md:p-16 lg:p-24 flex flex-col justify-center text-white">
                <span class="text-[#F97316] font-bold tracking-widest uppercase text-[11px] mb-4">First Responders</span>
                <h3 class="text-4xl md:text-5xl font-heading font-bold uppercase mb-6 leading-tight tracking-tight">Racing Against<br>The Clock</h3>
                <p class="text-white/80 text-lg md:text-xl leading-relaxed mb-10 max-w-lg font-light">
                    In remote barangays, access to immediate care is limited. Our youth responders on bicycles bridge that gap, delivering first aid and critical supplies faster than traditional vehicles ever could.
                </p>
                <div>
                    <a href="{{ url('/about') }}" class="btn-wbr">
                        <span>Watch The Film</span>
                        <svg class="w-5 h-5 arrow" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Story 2 (Reversed) -->
        <div class="flex flex-col md:flex-row-reverse w-full reveal">
            <!-- Image side -->
            <div class="w-full md:w-1/2 relative h-[400px] md:h-[600px] overflow-hidden group">
                <img src="{{ asset('images/impact-story.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Community empowerment">
                <!-- Play button overlay -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <button class="w-20 h-20 bg-white/20 hover:bg-[#132D6B] backdrop-blur-sm rounded-full flex items-center justify-center transition-all group-hover:scale-110 duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>
                </div>
            </div>
            <!-- Text side -->
            <div class="w-full md:w-1/2 bg-[#F8FAFC] p-10 md:p-16 lg:p-24 flex flex-col justify-center">
                <span class="text-[#132D6B] font-bold tracking-widest uppercase text-[11px] mb-4">Community Impact</span>
                <h3 class="text-4xl md:text-5xl font-heading font-bold text-[#111827] uppercase mb-6 leading-tight tracking-tight">Empowering The<br>Next Generation</h3>
                <p class="text-[#475569] text-lg md:text-xl leading-relaxed mb-10 max-w-lg font-light">
                    Bicycles do more than transport; they unlock potential. We see young riders turning into community leaders, taking responsibility for the health and safety of their neighbors.
                </p>
                <div>
                    <a href="{{ url('/news') }}" class="btn-wbr btn-wbr-dark">
                        <span>Read Their Stories</span>
                        <svg class="w-5 h-5 arrow" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- SECTION 4 PROGRAMS SLIDER -->
<section
    id="programs"
    class="relative bg-[#1a1a1a]"
    aria-labelledby="programs-heading"
    x-data="programSlider()"
>
    <!-- Top Header Bar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-12 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
        <div>
            <span class="text-[11px] font-bold tracking-widest uppercase text-[#F97316] block mb-2">Our Programs</span>
            <h2 id="programs-heading" class="text-4xl md:text-5xl font-heading font-bold text-white uppercase tracking-tight">
                What We Do
            </h2>
        </div>
        <a href="{{ url('/programs') }}" class="text-sm font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2 pb-1 tracking-wide">
            View All Programs
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
        </a>
    </div>

    <!-- Orange Divider -->
    <div class="w-full h-1 bg-[#F97316]"></div>

    <!-- Background Images -->
    <div class="relative w-full overflow-hidden bg-[#1a1a1a] min-h-[600px]">
        <template x-for="(prog, index) in programs" :key="index">
            <div
                class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out"
                :class="active === index ? 'opacity-100 z-10' : 'opacity-0 z-0'"
            >
                <!-- Zoom effect on active slide -->
                <img :src="prog.img" :alt="prog.title" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[8s] ease-out" :class="active === index ? 'scale-105' : 'scale-100'">
                <!-- Orange/Dark gradient overlay to match screenshot vibe -->
                <div class="absolute inset-0 bg-[#F97316] mix-blend-multiply opacity-40"></div>
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
        </template>
        
        <!-- Content Area -->
        <div class="absolute inset-0 z-20 flex items-center justify-center text-center px-4">
            <div class="w-full max-w-4xl relative h-[250px] flex items-center justify-center">
                <template x-for="(prog, index) in programs" :key="index">
                    <div
                        x-show="active === index"
                        x-transition:enter="transition ease-out duration-700 delay-200"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300 absolute inset-0"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="w-full flex flex-col items-center justify-center"
                    >
                        <h3 class="text-5xl md:text-7xl font-heading font-bold text-white mb-4 uppercase tracking-wider drop-shadow-lg" x-text="prog.title"></h3>
                        <p class="text-white/90 text-lg md:text-xl font-medium mb-8 max-w-2xl drop-shadow-md" x-text="prog.desc"></p>
                        <a
                            :href="prog.href"
                            class="inline-flex items-center justify-center px-8 py-3 text-sm font-bold text-white border-2 border-white hover:bg-white hover:text-[#1a1a1a] transition-colors duration-300 tracking-widest uppercase"
                        >
                            Learn More
                        </a>
                    </div>
                </template>
            </div>
        </div>
        
        <!-- Controls & Indicators -->
        <div class="absolute bottom-8 left-0 right-0 z-30 flex justify-center gap-3">
            <template x-for="(prog, index) in programs" :key="index">
                <button
                    @click="goTo(index)"
                    class="h-2 rounded-full transition-all duration-300"
                    :class="active === index ? 'w-6 bg-[#F97316]' : 'w-2 bg-white/50 hover:bg-white/80'"
                    :aria-label="'Go to slide ' + (index + 1)"
                ></button>
            </template>
        </div>
    </div>
    
    <!-- Bottom Orange Divider -->
    <div class="w-full h-1 bg-[#F97316]"></div>
</section>

<!-- SECTION 5 · FIND WHAT YOU NEED -->
<section
    id="quick-access"
    class="py-20 md:py-24 bg-[#F8FAFC]"
    aria-labelledby="quick-access-heading"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12 reveal">
            <h2 id="quick-access-heading" class="text-section-title-md font-heading font-bold text-[#111827]">
                Find What You Need
            </h2>
        </div>

        @php
        $quickLinks = [
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>',
                'bg'    => 'from-[#132D6B] to-[#1a3d8a]',
                'hover' => 'hover:shadow-[#132D6B]/20',
                'title' => 'Programs',
                'desc'  => 'Explore health, outreach, and disaster readiness initiatives.',
                'href'  => '/programs',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>',
                'bg'    => 'from-[#F97316] to-[#fb923c]',
                'hover' => 'hover:shadow-[#F97316]/20',
                'title' => 'Volunteer',
                'desc'  => 'Join our growing team of youth community responders.',
                'href'  => '/volunteer',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/>',
                'bg'    => 'from-[#2FA7FF] to-[#60c0ff]',
                'hover' => 'hover:shadow-[#2FA7FF]/20',
                'title' => 'News & Updates',
                'desc'  => 'Stay informed on our latest field operations and news.',
                'href'  => '/news',
            ],
            [
                'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>',
                'bg'    => 'from-[#16A34A] to-[#22c55e]',
                'hover' => 'hover:shadow-[#16A34A]/20',
                'title' => 'Contact Us',
                'desc'  => 'Reach our team for partnerships, media, or inquiries.',
                'href'  => '/contact',
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($quickLinks as $i => $link)
            <a
                href="{{ url($link['href']) }}"
                id="quick-link-{{ $i }}"
                class="group relative bg-white rounded-sm p-6 border border-[#F1F5F9] shadow-sm card-lift flex flex-col gap-4 overflow-hidden reveal [animation-delay:{{ $i * 80 }}ms]"
                aria-label="{{ $link['title'] }}"
            >
                <!-- Gradient blob on hover -->
                <div class="absolute -bottom-8 -right-8 w-28 h-28 rounded-full bg-gradient-to-br {{ $link['bg'] }} opacity-0 group-hover:opacity-8 transition-opacity duration-300 blur-2xl"></div>

                <div class="w-12 h-12 rounded-sm bg-gradient-to-br {{ $link['bg'] }} flex items-center justify-center shadow-lg {{ $link['hover'] }} transition-shadow duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        {!! $link['icon'] !!}
                    </svg>
                </div>

                <div>
                    <h3 class="font-heading font-semibold text-[#111827] text-lg mb-1.5 group-hover:text-[#132D6B] transition-colors duration-200">
                        {{ $link['title'] }}
                    </h3>
                    <p class="text-sm text-[#64748B] leading-relaxed">{{ $link['desc'] }}</p>
                </div>

                <div class="flex items-center gap-1 text-xs font-semibold text-[#132D6B] group-hover:text-[#2FA7FF] transition-colors duration-200 mt-auto">
                    Go
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>


<!-- SECTION 6 FEATURED IMPACT -->
<section
    id="featured-impact"
    class="py-20 md:py-28 bg-white overflow-hidden"
    aria-labelledby="impact-story-heading"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Left: Image -->
            <div class="relative reveal">
                <div class="relative rounded-sm overflow-hidden shadow-md aspect-[4/3]">
                    <img
                        src="{{ asset('images/impact-story.jpg') }}"
                        alt="Community gathering around bicycles at sunset"
                        class="w-full h-full object-cover"
                        loading="lazy"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0D1B2A]/40 to-transparent"></div>
                </div>

                <!-- Floating stat badge -->
                <div class="absolute -bottom-5 -right-5 bg-[#132D6B] text-white rounded-sm px-6 py-4 shadow-md hidden sm:block">
                    <div class="font-heading font-bold text-3xl">500+</div>
                    <div class="text-xs text-white/60 uppercase tracking-widest mt-0.5">Families Reached</div>
                </div>

                <!-- Decorative dot grid -->
                <div class="dot-grid absolute -top-6 -left-6 w-24 h-24 opacity-20" aria-hidden="true">
                </div>
            </div>

            <!-- Right: Story -->
            <div class="flex flex-col gap-6 reveal [animation-delay:150ms]">
                <div>
                    <span class="text-xs font-semibold tracking-widest uppercase text-[#F97316] block mb-3">Impact Story</span>
                    <h2
                        id="impact-story-heading"
                        class="text-impact-title font-heading font-bold text-[#111827] leading-tight mb-4"
                    >
                        Every Ride Creates<br/>
                        <span class="text-[#132D6B]">Community Impact</span>
                    </h2>
                    <p class="text-[#64748B] leading-relaxed">
                        In 2024, our volunteer cyclists logged over 18,000 hours responding to community needs across 45 barangays. Each ride represents a connection — a health check delivered, a family reached, a community made more resilient.
                    </p>
                </div>

                <!-- Impact highlights -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @php
                    $highlights = [
                        ['value' => '300+',  'label' => 'Medical Missions Conducted', 'bg' => 'bg-[#16A34A]', 'text' => 'text-[#16A34A]'],
                        ['value' => '12,000', 'label' => 'Beneficiaries Served',        'bg' => 'bg-[#2FA7FF]', 'text' => 'text-[#2FA7FF]'],
                        ['value' => '45',    'label' => 'Barangays Reached',            'bg' => 'bg-[#F97316]', 'text' => 'text-[#F97316]'],
                        ['value' => '85%',   'label' => 'Youth-Led Initiatives',         'bg' => 'bg-[#132D6B]', 'text' => 'text-[#132D6B]'],
                    ];
                    @endphp
                    @foreach ($highlights as $h)
                    <div class="flex items-start gap-3 p-4 rounded-sm bg-[#F8FAFC] border border-[#F1F5F9]">
                        <div class="w-1 self-stretch rounded-full shrink-0 {{ $h['bg'] }}"></div>
                        <div>
                            <div class="font-heading font-bold text-xl {{ $h['text'] }}">{{ $h['value'] }}</div>
                            <div class="text-xs text-[#64748B] leading-snug">{{ $h['label'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- CTA -->
                <div class="flex flex-col sm:flex-row gap-4 mt-2">
                    <a
                        href="{{ url('/about') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-sm text-sm font-semibold bg-[#132D6B] text-white hover:bg-[#2FA7FF] transition-all duration-300 shadow-sm hover:shadow hover:-translate-y-0.5"
                    >
                        Our Full Story
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <a
                        href="{{ url('/donate') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-sm text-sm font-semibold bg-white text-[#132D6B] border border-[#132D6B] hover:bg-[#132D6B] hover:text-white transition-all duration-300 shadow-sm"
                    >
                        Support Our Rides
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- SECTION 7 IMPACT STRIP  -->
<section
    id="impact"
    class="bg-[#0D1B2A] py-14 md:py-16"
    aria-label="Impact statistics"
    x-data="counterSection()"
    x-intersect.once="startCounters()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-0 divide-x divide-white/10">

             <!-- Stat 1 -->
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                <span
                    class="text-stat font-heading font-bold text-white mb-1"
                    x-text="counts[0].display"
                >0</span>
                <span class="text-[#2FA7FF] font-semibold text-xs tracking-widest uppercase mt-1">Trained Youth Volunteers</span>
            </div>

            <!-- Stat 2 -->
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                <span
                    class="text-stat font-heading font-bold text-white mb-1"
                    x-text="counts[1].display"
                >0</span>
                <span class="text-[#2FA7FF] font-semibold text-xs tracking-widest uppercase mt-1">Barangays Served</span>
            </div>

            <!-- Stat 3 -->
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center border-t md:border-t-0 border-white/10">
                <span
                    class="text-stat font-heading font-bold text-white mb-1"
                    x-text="counts[2].display"
                >0</span>
                <span class="text-[#2FA7FF] font-semibold text-xs tracking-widest uppercase mt-1">Volunteer Hours</span>
            </div>

            <!-- Stat 4 -->
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center border-t md:border-t-0 border-white/10">
                <span
                    class="text-stat font-heading font-bold text-white mb-1"
                    x-text="counts[3].display"
                >0</span>
                <span class="text-[#2FA7FF] font-semibold text-xs tracking-widest uppercase mt-1">Active Since</span>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 8 CALL TO ACTION -->
<section
    id="cta"
    class="relative py-24 md:py-32 overflow-hidden"
    aria-labelledby="cta-heading"
>
    <!-- Background -->
    <div class="absolute inset-0 bg-[#0D1B2A]"></div>

    <!-- Grid pattern overlay -->
    <div class="cta-grid-pattern absolute inset-0 opacity-[0.04]"
         aria-hidden="true"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">

        <span class="inline-block text-xs font-semibold tracking-widest uppercase text-[#F97316] mb-5">
            Get Involved
        </span>

        <h2
            id="cta-heading"
            class="text-cta-title font-heading font-bold text-white mb-6 leading-tight"
        >
            Ready To Make<br/>
            An <span class="text-[#2FA7FF]">Impact?</span>
        </h2>

        <p class="text-lg text-white/65 leading-relaxed mb-10 max-w-2xl mx-auto">
            Join volunteers, partners, and community leaders creating meaningful change throughout Pangasinan. Every contribution — time, skills, or resources — helps build a stronger community.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-6">
            <a
                href="{{ url('/volunteer') }}"
                id="cta-volunteer"
                class="btn-wbr btn-wbr-light backdrop-blur-sm"
            >
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                <span>Volunteer With Us</span>
            </a>
            <a
                href="{{ url('/donate') }}"
                id="cta-donate"
                class="btn-wbr"
            >
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                <span>Donate Now</span>
            </a>
        </div>

    </div>
</section>


<x-slot:scripts>
<script src="{{ asset('js/home.js') }}"></script>
</x-slot:scripts>

</x-layout>
