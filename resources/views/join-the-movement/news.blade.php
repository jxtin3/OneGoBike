<x-layout title="News & Updates - OneGoBike" description="Stay informed on our latest field operations and news.">
    <!-- Header Spacing -->
    <div class="pt-24 md:pt-32 pb-30 bg-[#0D1B2A]">
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
                            <img src="{{ $newsItem->image_path ? asset($newsItem->image_path) : asset('images/gobike-logo.png') }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                            
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 p-4">
                                <div class="text-white text-[10px] font-bold uppercase tracking-wider translate-y-2 group-hover:translate-y-0 transition-all duration-300 drop-shadow-md">
                                    {{ $newsItem->category }}
                                </div>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs font-semibold text-slate-500 mb-2">{{ $newsItem->published_at->format('F d, Y') }}</div>
                            <h3 class="text-xl font-heading font-bold text-slate-900 leading-tight mb-3 line-clamp-2">{{ $newsItem->title }}</h3>
                            <p class="text-sm text-slate-600 mb-6 flex-grow line-clamp-3">{{ $newsItem->excerpt }}</p>
                            <a href="#" class="flex justify-center text-sm font-bold text-white bg-[#2563EB] hover:bg-[#2FA7FF] no-underline px-5 py-2.5 rounded-full transition-all duration-300 uppercase tracking-wide mt-auto shadow-sm hover:shadow-md">
                                Read More
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

<!-- volunteer -->
        @include('partials.volunteer-card')


</x-layout>
