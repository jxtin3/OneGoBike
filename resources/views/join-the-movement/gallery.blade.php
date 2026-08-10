<x-layout title="Gallery - OneGoBike" description="View our gallery showcase of youth responders and community events in Pangasinan.">
    <!-- Header Spacing -->
    <div class="pt-24 md:pt-32 pb-30 bg-[#0D1B2A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h1 class="text-4xl md:text-5xl font-heading font-bold text-white uppercase mb-4">Community Gallery</h1>
            <p class="text-white/70 max-w-2xl mx-auto">Explore moments of impact, community resilience, and volunteer dedication captured during our field operations.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-16 md:py-24 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Gallery Image 1 -->
                <div class="relative w-full aspect-[4/3] rounded-sm overflow-hidden group shadow-sm hover:shadow-md transition-all duration-300 reveal reveal-delay-1">
                    <img src="{{ asset('images/story-1.jpg') }}" alt="Youth responders in action" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#F97316] mb-1">Field Operations</div>
                            <h3 class="text-lg font-heading font-bold uppercase">Racing Against The Clock</h3>
                        </div>
                    </div>
                </div>

                <!-- Gallery Image 2 -->
                <div class="relative w-full aspect-[4/3] rounded-sm overflow-hidden group shadow-sm hover:shadow-md transition-all duration-300 reveal reveal-delay-2">
                    <img src="{{ asset('images/story-2.jpg') }}" alt="Community support" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#2FA7FF] mb-1">Community Support</div>
                            <h3 class="text-lg font-heading font-bold uppercase">Empowering Volunteers</h3>
                        </div>
                    </div>
                </div>

                <!-- Gallery Image 3 -->
                <div class="relative w-full aspect-[4/3] rounded-sm overflow-hidden group shadow-sm hover:shadow-md transition-all duration-300 reveal reveal-delay-3">
                    <img src="{{ asset('images/story-3.jpg') }}" alt="Together for community" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#F97316] mb-1">Medical Missions</div>
                            <h3 class="text-lg font-heading font-bold uppercase">Serving Remote Barangays</h3>
                        </div>
                    </div>
                </div>

                <!-- Gallery Image 4 -->
                <div class="relative w-full aspect-[4/3] rounded-sm overflow-hidden group shadow-sm hover:shadow-md transition-all duration-300 reveal reveal-delay-1">
                    <img src="{{ asset('images/home.jpg') }}" alt="Bicycle deployment" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#2FA7FF] mb-1">Impact</div>
                            <h3 class="text-lg font-heading font-bold uppercase">New Bicycles Deployed</h3>
                        </div>
                    </div>
                </div>

                <!-- Gallery Image 5 -->
                <div class="relative w-full aspect-[4/3] rounded-sm overflow-hidden group shadow-sm hover:shadow-md transition-all duration-300 reveal reveal-delay-2">
                    <img src="{{ asset('images/home1.jpg') }}" alt="Volunteers group" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#F97316] mb-1">Training</div>
                            <h3 class="text-lg font-heading font-bold uppercase">Youth Leadership</h3>
                        </div>
                    </div>
                </div>

                <!-- Gallery Image 6 -->
                <div class="relative w-full aspect-[4/3] rounded-sm overflow-hidden group shadow-sm hover:shadow-md transition-all duration-300 reveal reveal-delay-3">
                    <img src="{{ asset('images/impact-story.jpg') }}" alt="Health outreach" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-[#2FA7FF] mb-1">Outreach</div>
                            <h3 class="text-lg font-heading font-bold uppercase">Building Resilient Communities</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
