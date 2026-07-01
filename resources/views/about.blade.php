<x-layout
    title="About Us — OneGoBike"
    description="Learn about our history, our mission, and the dedicated youth responders behind OneGoBike Pangasinan."
>

<!-- ═══════════════════════════════════════════════════════════
     HERO SECTION
     ═══════════════════════════════════════════════════════════ -->
<section class="relative pt-32 pb-20 md:pt-48 md:pb-32 overflow-hidden bg-[#0D1B2A]">
    <!-- Background image -->
    <div class="absolute inset-0 z-0">
        <img
            src="{{ asset('images/story-3.jpg') }}"
            alt="OneGoBike Volunteers"
            class="w-full h-full object-cover object-top opacity-40"
        />
        <div class="absolute inset-0 bg-gradient-to-b from-[#0D1B2A] via-transparent to-[#0D1B2A]"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
        <span class="inline-flex items-center gap-2 text-[10px] font-bold tracking-[0.22em] uppercase text-[#F97316] mb-4">
            <span class="w-2 h-2 rounded-full bg-[#F97316]"></span>
            Our Story
        </span>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-heading font-bold text-white mb-6 uppercase tracking-tight leading-none drop-shadow-lg">
            Driven by Youth.<br/>
            <span class="text-[#2FA7FF]">Built for Pangasinan.</span>
        </h1>
        <p class="text-base md:text-lg text-white/70 max-w-2xl mx-auto leading-relaxed">
            OneGoBike started with a simple idea: that a bicycle can be an instrument of change. Today, we are a recognized force of community responders serving dozens of barangays.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     MISSION & VISION
     ═══════════════════════════════════════════════════════════ -->
<section class="py-20 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16">
            
            <!-- Mission -->
            <div class="mission-card p-10 md:p-14 bg-[#F8FAFC] border border-[#F1F5F9] rounded-sm reveal">
                <div class="w-12 h-12 rounded-sm bg-[#F97316]/10 flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-[#F97316]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-heading font-bold text-[#111827] mb-4 uppercase tracking-wide">Our Mission</h2>
                <p class="text-[#64748B] leading-relaxed">
                    To mobilize and empower the youth of Pangasinan through cycling and volunteerism, providing rapid community response, accessible health outreach, and proactive disaster preparedness initiatives for marginalized barangays.
                </p>
            </div>

            <!-- Vision -->
            <div class="mission-card p-10 md:p-14 bg-[#132D6B] text-white border border-[#132D6B] rounded-sm reveal reveal-delay-1 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#2FA7FF]/10 rounded-full blur-3xl"></div>
                <div class="w-12 h-12 rounded-sm bg-white/10 flex items-center justify-center mb-6 relative z-10">
                    <svg class="w-6 h-6 text-[#2FA7FF]" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-heading font-bold text-white mb-4 uppercase tracking-wide relative z-10">Our Vision</h2>
                <p class="text-white/70 leading-relaxed relative z-10">
                    A highly resilient, health-conscious, and deeply connected Philippine province where the youth lead the charge in fostering Bayanihan, ensuring no community is left behind in times of need.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     HISTORY / TIMELINE
     ═══════════════════════════════════════════════════════════ -->
<section class="py-20 md:py-28 bg-[#F8FAFC]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 text-[10px] font-bold tracking-[0.22em] uppercase text-[#F97316] mb-4">
                The Journey
            </span>
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#111827] uppercase tracking-tight">How It Started</h2>
        </div>

        <div class="relative border-l-2 border-[#132D6B]/10 pl-8 ml-4 md:ml-0 md:pl-0 md:border-none space-y-12">
            
            <!-- Timeline Center Line (Desktop) -->
            <div class="hidden md:block absolute top-0 bottom-0 left-1/2 -translate-x-1/2 w-0.5 bg-gradient-to-b from-[#F97316] via-[#132D6B]/20 to-transparent"></div>

            @php
            $timeline = [
                ['year' => '2019', 'title' => 'The First Ride', 'desc' => 'A small group of passionate cyclists in Dagupan City began delivering basic first aid and supplies to remote areas unreachable by four-wheeled vehicles.', 'align' => 'left'],
                ['year' => '2021', 'title' => 'Pandemic Response', 'desc' => 'During the height of COVID-19, OneGoBike transformed into a critical lifeline, distributing medicines and relief goods when public transportation was halted.', 'align' => 'right'],
                ['year' => '2023', 'title' => 'Official Accreditation', 'desc' => 'Recognized by the DILG and partnered with local LGUs, formalizing our status as an essential youth-led disaster response and health outreach organization.', 'align' => 'left'],
                ['year' => '2025', 'title' => 'Provincial Expansion', 'desc' => 'Now operating across 45 barangays with over 2,500 trained youth volunteers, pushing the boundaries of what community service looks like in the modern era.', 'align' => 'right'],
            ];
            @endphp

            @foreach ($timeline as $idx => $item)
            <div class="relative md:w-1/2 {{ $item['align'] === 'left' ? 'md:pr-12 md:text-right' : 'md:pl-12 md:ml-auto' }} reveal">
                <!-- Dot -->
                <div class="absolute top-1 -left-[41px] md:top-1/2 md:-translate-y-1/2 {{ $item['align'] === 'left' ? 'md:-right-[7px] md:left-auto' : 'md:-left-[7px]' }} w-3.5 h-3.5 rounded-full bg-[#F97316] ring-4 ring-[#F8FAFC]"></div>
                
                <div class="bg-white p-6 md:p-8 rounded-sm shadow-sm border border-[#F1F5F9] card-lift">
                    <span class="text-4xl font-heading font-black text-[#132D6B]/10 absolute top-4 {{ $item['align'] === 'left' ? 'right-6' : 'right-6 md:left-6 md:right-auto' }}">{{ $item['year'] }}</span>
                    <h3 class="text-xl font-heading font-bold text-[#111827] mb-2 relative z-10">{{ $item['title'] }}</h3>
                    <p class="text-[#64748B] text-sm leading-relaxed relative z-10">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     CTA
     ═══════════════════════════════════════════════════════════ -->
<section class="py-24 bg-[#0D1B2A] text-center px-4">
    <div class="max-w-3xl mx-auto reveal">
        <h2 class="text-3xl md:text-5xl font-heading font-bold text-white mb-6 uppercase tracking-tight">Be Part of the Story</h2>
        <p class="text-white/60 mb-10 text-lg">Whether you ride a bike, have medical training, or just want to serve the community—there is a place for you here.</p>
        <a href="{{ url('/volunteer') }}" class="btn-wbr btn-wbr-orange">
            <span>Join Our Team</span>
            <svg class="w-5 h-5 arrow" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
        </a>
    </div>
</section>

</x-layout>
