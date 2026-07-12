<x-layout
    title="Our Programs — OneGoBike"
    description="Discover how our programs in health, disaster preparedness, and community outreach make an impact."
>

<!-- HERO SECTION -->
<section class="relative pt-32 pb-20 md:pt-48 md:pb-32 overflow-hidden bg-[#0D1B2A]">
    <!-- Background image -->
    <div class="absolute inset-0 z-0">
        <img
            src="{{ asset('images/prog-1.jpg') }}"
            alt="OneGoBike Programs"
            class="w-full h-full object-cover object-center opacity-40"
        />
        <div class="absolute inset-0 bg-gradient-to-b from-[#0D1B2A] via-transparent to-[#0D1B2A]"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
        <!-- <span class="inline-flex items-center gap-2 text-[10px] font-bold tracking-[0.22em] uppercase text-[#F97316] mb-4">
            <span class="w-2 h-2 rounded-full bg-[#F97316]"></span>
            Our Initiatives
        </span> -->
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-heading font-bold text-white mb-6 uppercase tracking-tight leading-none drop-shadow-lg">
            Impact In<br/>
            <span class="text-[#2FA7FF]">Motion.</span>
        </h1>
        <p class="text-base md:text-lg text-white/70 max-w-2xl mx-auto leading-relaxed">
            We operate dynamic, youth-led programs designed to serve the most pressing needs of our local barangays.
        </p>
    </div>
</section>

<!-- PROGRAMS GRID -->
<section class="py-20 md:py-28 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-16">
            
            @php
            $programsList = [
                [
                    'title' => 'Health & Medical Outreach',
                    'desc' => 'Deploying bicycle-mounted medical responders to remote areas. Our volunteers provide basic first aid, distribute vitamins, and assist local health units during medical missions.',
                    'img' => 'story-1.jpg',
                    'accent' => '#F97316',
                ],
                [
                    'title' => 'Disaster Preparedness',
                    'desc' => 'Equipping the youth with essential survival skills, emergency response training, and the logistical capability to act rapidly when natural disasters strike Pangasinan.',
                    'img' => 'impact-story.jpg',
                    'accent' => '#2FA7FF',
                ],
                [
                    'title' => 'Youth Volunteer Mobilization',
                    'desc' => 'We train the next generation of leaders. Through our volunteer program, young Pangasinenses learn discipline, civic duty, and the spirit of Bayanihan.',
                    'img' => 'story-2.jpg',
                    'accent' => '#16A34A',
                ],
                [
                    'title' => 'Livelihood & Community Action',
                    'desc' => 'Beyond emergency response, we engage in community building. This includes livelihood workshops, environmental clean-ups, and supporting local cycling micro-businesses.',
                    'img' => 'story-3.jpg',
                    'accent' => '#132D6B',
                ]
            ];
            @endphp

            @foreach ($programsList as $idx => $prog)
            <div class="group bg-white rounded-sm overflow-hidden shadow-sm border border-[#F1F5F9] card-lift reveal reveal-delay-{{ $idx % 2 + 1 }}">
                <div class="h-64 overflow-hidden relative">
                    <img src="{{ asset('images/' . $prog['img']) }}" alt="{{ $prog['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors duration-300"></div>
                    <div class="absolute top-4 left-4 w-10 h-10 bg-white shadow-md flex items-center justify-center rounded-sm">
                        <span class="font-heading font-black text-xl" style="color: {{ $prog['accent'] }}">{{ sprintf('%02d', $idx + 1) }}</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-heading font-bold text-[#111827] mb-3 group-hover:text-[#132D6B] transition-colors">{{ $prog['title'] }}</h3>
                    <p class="text-[#64748B] leading-relaxed mb-6">{{ $prog['desc'] }}</p>
                    <a href="#" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-widest transition-colors hover:opacity-80" style="color: {{ $prog['accent'] }}">
                        View Details
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

<!-- 
     CTA
      -->
<section class="py-24 bg-white text-center px-4 border-t border-[#F1F5F9]">
    <div class="max-w-2xl mx-auto reveal">
        <h2 class="text-3xl md:text-5xl font-heading font-bold text-[#111827] mb-6 uppercase tracking-tight">Support Our Work</h2>
        <p class="text-[#64748B] mb-10 text-lg">Our programs rely on the generosity of individuals and partners who believe in the power of youth.</p>
        <a href="{{ url('/donate') }}" class="btn-wbr btn-wbr-dark">
            <span>Make a Donation</span>
            <!-- <svg class="w-5 h-5 arrow" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg> -->
        </a>
    </div>
</section>

</x-layout>

