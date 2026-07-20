<x-layout title="News & Updates - OneGoBike" description="Stay informed on our latest field operations and news.">
    <!-- Header Spacing -->
    <div class="pt-24 md:pt-32 pb-12 bg-[#0D1B2A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h1 class="text-4xl md:text-5xl font-heading font-bold text-white uppercase mb-4">News & Updates</h1>
            <p class="text-white/70 max-w-2xl mx-auto">Stay informed on our latest field operations, announcements, and community impact stories across Pangasinan.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-16 md:py-24 bg-[#F8FAFC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($news) && $news->count() > 0)
                    @foreach($news as $i => $newsItem)
                    <div class="bg-white border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col h-full rounded-sm overflow-hidden hover:-translate-y-2 group reveal reveal-delay-{{ $i + 1 }}">
                        <div class="relative w-full aspect-video overflow-hidden bg-slate-100">
                            <div class="absolute top-4 left-4 bg-[#132D6B] text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 z-10">
                                {{ $newsItem->category }}
                            </div>
                            <img src="{{ $newsItem->image_path ? asset($newsItem->image_path) : asset('images/gobike-logo.png') }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs font-semibold text-slate-500 mb-2">{{ $newsItem->published_at->format('F d, Y') }}</div>
                            <h3 class="text-xl font-heading font-bold text-slate-900 leading-tight mb-3 line-clamp-2">{{ $newsItem->title }}</h3>
                            <p class="text-sm text-slate-600 mb-6 flex-grow line-clamp-3">{{ $newsItem->excerpt }}</p>
                            <a href="#" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#132D6B] group-hover:text-[#2FA7FF] transition-colors uppercase tracking-wide mt-auto">
                                Read More
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center py-12 reveal">
                        <p class="text-slate-500 text-lg">No news available at the moment. Please check back later.</p>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if(isset($news) && $news->hasPages())
            <div class="mt-12 flex justify-center reveal">
                {{ $news->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Feedback & Support Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 reveal">
            <!-- Main rounded container -->
            <div class="bg-[#f0f0f0] rounded-[2rem] border border-gray-200 p-8 md:p-12 lg:p-16 flex flex-col md:flex-row gap-12 lg:gap-20">
                
                <!-- Left Column -->
                <div class="w-full md:w-[45%] flex flex-col justify-center">
                    <div class="mb-6">
                        <span class="inline-flex flex-col text-[#F97316] font-bold text-[10px] tracking-widest uppercase">
                            Support
                            <span class="w-20 h-0.5 bg-[#F97316] mt-1"></span>
                        </span>
                    </div>
                    
                    <h2 class="text-3xl md:text-5xl font-heading font-bold text-gray-900 mb-6 tracking-tight">How can we Help?</h2>
                    
                    <p class="text-gray-600 text-base md:text-lg mb-10 leading-relaxed max-w-md">
                        Find quick answers to common questions. Our support system is designed to give you immediate assistance, reducing the need for phone calls.
                    </p>
                    
                    <div class="relative max-w-md mb-4 flex items-center">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Ask a question..." class="w-full pl-11 pr-12 py-3.5 bg-white border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#2FA7FF] focus:border-transparent text-gray-700 placeholder-gray-400 shadow-sm" />
                        <button type="button" class="absolute inset-y-1.5 right-1.5 w-8 h-8 flex items-center justify-center bg-[#132D6B] hover:bg-[#2FA7FF] text-white rounded-full transition-colors shadow-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-xs text-gray-500 leading-relaxed max-w-sm">
                        Can't find what you're looking for? Use the chat icon to talk to our digital assistant.
                    </p>
                </div>
                
                <!-- Right Column (FAQ Box) -->
                <div class="w-full md:w-[55%] bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-gray-100">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 font-heading">Your Question Probably Are</h3>
                    
                    <div class="flex flex-col gap-6">
                        <!-- FAQ Item 1 -->
                        <div>
                            <h4 class="font-bold text-sm text-gray-900 mb-2">How can I request a house-to-house training?</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">
                                Navigate to the What We Do page and select the plan that fits your household. Fill in the subscription form and our dispatch team will contact you within 1-2 business days to schedule your session.
                            </p>
                        </div>
                        
                        <!-- FAQ Item 2 -->
                        <div>
                            <h4 class="font-bold text-sm text-gray-900 mb-2">What is the minimum age to volunteer?</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">
                                Our youth responder program accepts volunteers aged 13 to 25. Minors aged 13-17 will need written parental consent to participate in active field training and dispatch activities.
                            </p>
                        </div>
                        
                        <!-- FAQ Item 3 -->
                        <div>
                            <h4 class="font-bold text-sm text-gray-900 mb-2">Who do I contact in case of an immediate emergency?</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">
                                Go Bike is a supplementary first responder organization. Always dial 911 or your local MDRRMO first. We coordinate closely with local authorities for dispatch and triaging.
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</x-layout>
