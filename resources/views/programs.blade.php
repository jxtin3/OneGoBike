<x-layout
    title="What we Do - OneGoBike"
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

<!-- TRAINING TIERS -->
<section class="py-20 md:py-28 bg-white border-t border-[#F1F5F9]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-16 reveal">
            <span class="inline-flex items-center gap-2 text-[10px] font-bold tracking-[0.22em] uppercase text-[#F97316] mb-3">
                Step 1 - Choose Your Plan
            </span>
            <h2 class="text-4xl md:text-5xl font-heading font-bold text-[#111827] mb-4">House-to-House Training Tiers</h2>
            <p class="text-[#64748B] text-lg max-w-3xl">
                Request our trained youth responders to conduct first-aid and emergency preparedness training directly at your home.
            </p>
        </div>        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Basic Tier -->
            <div class="relative bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col reveal reveal-delay-1">
                <!-- Gradient Background -->
                <div class="absolute top-0 left-0 w-full h-[45%] bg-gradient-to-b from-[#16a34a] via-[#16a34a]/90 to-transparent pointer-events-none"></div>
                
                <div class="relative p-10 flex flex-col h-full">
                    <div class="mb-12 mt-2">
                        <span class="text-xs font-bold tracking-widest text-white uppercase mb-3 block drop-shadow-sm">Basic</span>
                        <div class="text-5xl font-heading font-bold text-white mb-3 drop-shadow-sm">Free</div>
                        <p class="text-white/90 text-sm font-medium">No cost for qualifying families</p>
                    </div>
                    
                    <div class="flex-grow flex flex-col">
                        <p class="text-gray-600 text-sm mb-8 leading-relaxed">
                            Core first-aid awareness for households wanting essential emergency preparedness.
                        </p>
                        <ul class="space-y-4 mb-10 flex-grow">
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#16A34A] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Basic wound care & CPR demo
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#16A34A] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Emergency contact setup
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#16A34A] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Household safety checklist
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#16A34A] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                1-session onsite visit
                            </li>
                        </ul>
                        <a href="#request-form" class="block w-full py-2.5 text-center text-sm font-bold tracking-wide uppercase text-[#16A34A] bg-white border-2 border-[#16A34A] rounded-full hover:bg-[#16A34A] hover:text-white transition-colors">Select BASIC</a>                    </div>
                </div>
            </div>

            <!-- Standard Tier -->
            <div class="relative bg-white rounded-3xl border border-[#2a2468]/20 overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col transform lg:-translate-y-4 reveal reveal-delay-2">
                <!-- Gradient Background -->
                <div class="absolute top-0 left-0 w-full h-[55%] bg-gradient-to-b from-[#2a2468] via-[#2a2468]/90 to-transparent pointer-events-none"></div>
                
                
                <div class="relative p-10 flex flex-col h-full">
                    <div class="mb-12 mt-2">
                        <span class="text-xs font-bold tracking-widest text-white uppercase mb-3 block drop-shadow-sm">Standard</span>
                        <div class="text-5xl font-heading font-bold text-white mb-3 drop-shadow-sm flex items-baseline gap-2">
                            <span>₱ 499</span>
                        </div>
                        <p class="text-white/90 text-sm font-medium">Per household / session</p>
                    </div>
                    
                    <div class="flex-grow flex flex-col">
                        <p class="text-[#2a2468] font-medium text-sm mb-8 leading-relaxed">
                            Comprehensive training for families wanting hands-on skills and readiness planning.
                        </p>
                        <ul class="space-y-4 mb-10 flex-grow">
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#2a2468] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Everything in Basic
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#2a2468] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                CPR & BLS certification
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#2a2468] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Disaster readiness planning
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#2a2468] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Emergency kit assembly guide
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#2a2468] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                3-session onsite training
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#2a2468] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Responder group access
                            </li>
                        </ul>
                        <a href="#request-form" class="block w-full py-2.5 text-center text-sm font-bold tracking-wide uppercase text-[#2a2468] bg-white border-2 border-[#2a2468] rounded-full hover:bg-[#2a2468] hover:text-white transition-colors">Select STANDARD</a>                    </div>
                </div>
            </div>

            <!-- Advance Tier -->
            <div class="relative bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 flex flex-col reveal reveal-delay-3">
                <!-- Gradient Background -->
                <div class="absolute top-0 left-0 w-full h-[60%] bg-gradient-to-b from-[#7a2b2b] via-[#7a2b2b]/90 to-transparent pointer-events-none"></div>
                
                <div class="relative p-10 flex flex-col h-full">
                    <div class="mb-12 mt-2">
                        <span class="text-xs font-bold tracking-widest text-white uppercase mb-3 block drop-shadow-sm">Advance</span>
                        <div class="text-5xl font-heading font-bold text-white mb-3 drop-shadow-sm flex items-baseline gap-2">
                            <span>₱ 999</span>
                        </div>
                        <p class="text-white/90 text-sm font-medium">Per household / full module</p>
                    </div>
                    
                    <div class="flex-grow flex flex-col">
                        <p class="text-white/90 font-medium text-sm mb-8 leading-relaxed">
                            Full responder module for those who want to be community-level health advocates.
                        </p>
                        <ul class="space-y-4 mb-10 flex-grow">
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#7a2b2b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Everything in Standard
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#7a2b2b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Advanced first aid module
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#7a2b2b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Volunteer facilitator track
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#7a2b2b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Barangay coordination training
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#7a2b2b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                6-session extended program
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#7a2b2b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Certificate of completion
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-700">
                                <svg class="w-5 h-5 text-[#7a2b2b] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                                Priority dispatch access
                            </li>
                        </ul>
                        <a href="#request-form" class="block w-full py-2.5 text-center text-sm font-bold tracking-wide uppercase text-[#7a2b2b] bg-white border-2 border-[#7a2b2b] rounded-full hover:bg-[#7a2b2b] hover:text-white transition-colors">Select ADVANCE</a>                    </div>
                </div>
            </div>
        </div></div>
    </div>
</section>

<!-- REQUEST FORM -->
<section id="request-form" class="py-16 md:py-24 bg-[#F8FAFC]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 reveal">
        
        <div class="mb-10 text-left">
            <span class="inline-flex items-center gap-2 text-[10px] font-bold tracking-[0.22em] uppercase text-[#F97316] mb-3">
                Step 2 - Submit Your Info
            </span>
            <h2 class="text-3xl md:text-4xl font-heading font-bold text-[#111827] mb-3">Request a Training Session</h2>
            <p class="text-[#64748B] text-base max-w-lg">
                Fill out the form below and our dispatch team will contact you to schedule your selected plan.
            </p>
        </div>

        <div class="bg-[#FAFAFA] rounded-[2rem] border border-gray-200 shadow-sm p-8 md:p-12">
            <form action="#" method="POST" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Juan dela Cruz" class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#132D6B] focus:border-transparent transition-shadow text-gray-800" required>
                    </div>
                    
                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Address <span class="text-red-500">*</span></label>
                        <input type="text" id="address" name="address" placeholder="juan@gmail.com" class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#132D6B] focus:border-transparent transition-shadow text-gray-800" required>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+63 900 000 0000" class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#132D6B] focus:border-transparent transition-shadow text-gray-800">
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" placeholder="juan@gmail.com" class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#132D6B] focus:border-transparent transition-shadow text-gray-800" required>
                    </div>
                </div>

                <!-- Additional Message -->
                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Additional Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Any special requirements, preferred schedule or questions..." class="w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#132D6B] focus:border-transparent transition-shadow resize-none text-gray-800"></textarea>
                </div>

                <div class="flex justify-center pt-6">
                    <button type="submit" class="inline-flex items-center justify-center gap-2 px-20 py-3.5 bg-[#1e293b] text-white text-sm font-bold rounded-full hover:bg-black transition-colors shadow-sm w-full md:w-auto">
                        Submit Training Request
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" /></svg>
                    </button>
                </div>
            </form>
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

