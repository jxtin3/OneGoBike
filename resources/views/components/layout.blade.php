<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#0D1B2A" />

    {{-- SEO --}}
    <title>{{ $title ?? 'OneGoBike — Youth-Led Community Responders, Pangasinan' }}</title>
    <meta name="description" content="{{ $description ?? 'OneGoBike mobilizes youth volunteers, cyclists, and responders to improve health, resilience, disaster preparedness, and community engagement throughout Pangasinan.' }}" />
    <meta name="keywords" content="OneGoBike, Pangasinan, youth volunteers, community responders, cyclists, disaster preparedness, health outreach" />

    {{-- Open Graph --}}
    <meta property="og:type"        content="website" />
    <meta property="og:url"         content="{{ url()->current() }}" />
    <meta property="og:title"       content="{{ $title ?? 'OneGoBike — Youth-Led Community Responders' }}" />
    <meta property="og:description" content="{{ $description ?? 'Mobilizing volunteers, cyclists, and community leaders across Pangasinan.' }}" />
    <meta property="og:image"       content="{{ asset('images/hero-home.jpg') }}" />

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    {{-- Fonts (preconnect for performance) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    {{-- Vite assets (Tailwind CSS + JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Additional head slot --}}
    {{ $head ?? '' }}
</head>

<body class="bg-[#F8FAFC] text-[#111827] antialiased" x-data="{ mobileOpen: false, scrolled: false }" @keydown.escape.window="mobileOpen = false">

    {{-- STICKY HEADER --}}
    <header
        id="site-header"
        class="fixed top-0 inset-x-0 z-50 transition-all duration-300"
        :class="scrolled
            ? 'bg-[#0D1B2A]/95 backdrop-blur-md shadow-lg shadow-black/20'
            : 'bg-transparent'"
        x-init="
            window.addEventListener('scroll', () => {
                scrolled = window.scrollY > 60;
            });
        "
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">

            <!-- Logo -->
                <a
                    href="{{ url('/') }}"
                    class="flex flex-col leading-none group shrink-0"
                    aria-label="OneGoBike Home"
                >
                    <span class="font-heading text-2xl font-bold tracking-wider">
                        <span class="text-[#F97316] group-hover:brightness-110 transition-all duration-200">One</span><!--
                     --><span class="text-[#2FA7FF] group-hover:brightness-110 transition-all duration-200">GoBike</span>
                    </span>
                    <span class="text-[10px] font-medium tracking-[0.18em] text-white/60 uppercase -mt-0.5">Community Responders</span>
                </a>

                 <!-- Desktop Navigation  -->
                <nav class="hidden md:flex items-center gap-8" aria-label="Primary navigation">
                    <x-nav-link href="{{ url('/about') }}">About</x-nav-link>
                    <x-nav-link href="{{ url('/programs') }}">Programs</x-nav-link>
                    <x-nav-link href="{{ url('/community') }}">Community</x-nav-link>
                    <x-nav-link href="{{ url('/contact') }}">Contact</x-nav-link>
                </nav>

                <!-- Right Side CTA  -->
                <div class="hidden md:flex items-center gap-4">
                    <a
                        href="{{ url('/donate') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-sm text-sm font-semibold tracking-wide bg-white text-[#132D6B] hover:bg-[#2FA7FF] hover:text-white transition-colors duration-200 shadow-sm"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                        Donate
                    </a>
                </div>

                <!--  Hamburger (mobile)  -->
                <button
                    id="mobile-menu-toggle"
                    type="button"
                    class="md:hidden p-2 rounded-sm text-white hover:bg-white/10 transition-colors duration-200"
                    :aria-expanded="mobileOpen"
                    aria-controls="mobile-menu"
                    aria-label="Toggle mobile menu"
                    @click="mobileOpen = !mobileOpen"
                >
                    <span class="sr-only">Toggle menu</span>
                    <!-- Hamburger icon morphs to X  -->
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>

        <!-- Mobile Menu  -->
        <div
            id="mobile-menu"
            x-show="mobileOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="md:hidden bg-[#0D1B2A]/97 backdrop-blur-lg border-t border-white/10"
            @click.outside="mobileOpen = false"
        >
            <nav class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-1" aria-label="Mobile navigation">
                <x-nav-link :mobile="true" href="{{ url('/about') }}"     @click="mobileOpen = false">About</x-nav-link>
                <x-nav-link :mobile="true" href="{{ url('/programs') }}"   @click="mobileOpen = false">Programs</x-nav-link>
                <x-nav-link :mobile="true" href="{{ url('/community') }}"  @click="mobileOpen = false">Community</x-nav-link>
                <x-nav-link :mobile="true" href="{{ url('/contact') }}"    @click="mobileOpen = false">Contact</x-nav-link>

                <div class="mt-3 pt-3 border-t border-white/10">
                    <a
                        href="{{ url('/donate') }}"
                        class="flex items-center justify-center gap-2 w-full px-4 py-3 rounded-sm text-sm font-semibold bg-white text-[#132D6B]"
                        @click="mobileOpen = false"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /></svg>
                        Donate Now
                    </a>
                </div>
            </nav>
        </div>
    </header>

         <!-- MAIN CONTENT -->
    <main id="main-content">
        {{ $slot }}
    </main>

    
    <!-- Alpine.js (Moved to bottom before footer) -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

         <!-- GLOBAL FOOTER -->
    <footer class="bg-[#0D1B2A] text-white" aria-label="Site footer">

        <!-- Main footer grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-16">

                <!-- Column 1 - Brand + Social -->
                <div class="flex flex-col gap-5">
                    <a href="{{ url('/') }}" class="inline-block" aria-label="OneGoBike Home">
                        <span class="font-heading text-3xl font-bold tracking-wider">
                            <span class="text-[#F97316]">GO</span><span class="text-[#2FA7FF]">BIKE</span>
                        </span>
                        <p class="text-[11px] tracking-[0.18em] text-white/50 uppercase mt-0.5">Community Responders</p>
                    </a>
                    <p class="text-sm text-white/60 leading-relaxed max-w-xs">
                        A youth-led community organization mobilizing volunteers, responders, cyclists, and local communities to improve health, resilience, and disaster preparedness throughout Pangasinan.
                    </p>
                    <!-- Social Icons -->
                    <div class="flex items-center gap-3 mt-1" role="list" aria-label="Social media links">
                        <!-- Facebook -->
                        <a href="#" role="listitem" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#2FA7FF] transition-colors duration-200" aria-label="Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <!-- Instagram -->
                        <a href="#" role="listitem" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#2FA7FF] transition-colors duration-200" aria-label="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                        </a>
                        <!-- Twitter / X -->
                        <a href="#" role="listitem" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#2FA7FF] transition-colors duration-200" aria-label="Twitter / X">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <!-- YouTube -->
                        <a href="#" role="listitem" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#2FA7FF] transition-colors duration-200" aria-label="YouTube">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2 - Quick Links -->
                <div>
                    <h3 class="font-heading text-base font-semibold tracking-wider uppercase text-white mb-5">Quick Links</h3>
                    <ul class="space-y-2.5" role="list">
                        @foreach ([
                            ['label' => 'About Us',   'href' => '/about'],
                            ['label' => 'Programs',   'href' => '/programs'],
                            ['label' => 'Community',  'href' => '/community'],
                            ['label' => 'Contact',    'href' => '/contact'],
                        ] as $link)
                        <li>
                            <a href="{{ url($link['href']) }}" class="text-sm text-white/60 hover:text-[#2FA7FF] transition-colors duration-200 flex items-center gap-2 group">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#2FA7FF]/40 group-hover:bg-[#2FA7FF] transition-colors duration-200 shrink-0"></span>
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                 <!-- Column 3 – Support  -->
                <div>
                    <h3 class="font-heading text-base font-semibold tracking-wider uppercase text-white mb-5">Support</h3>
                    <ul class="space-y-2.5" role="list">
                        @foreach ([
                            ['label' => 'Volunteer',      'href' => '/volunteer'],
                            ['label' => 'Donate',         'href' => '/donate'],
                            ['label' => 'News & Updates', 'href' => '/news'],
                            ['label' => 'Gallery',        'href' => '/gallery'],
                        ] as $link)
                        <li>
                            <a href="{{ url($link['href']) }}" class="text-sm text-white/60 hover:text-[#2FA7FF] transition-colors duration-200 flex items-center gap-2 group">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#F97316]/40 group-hover:bg-[#F97316] transition-colors duration-200 shrink-0"></span>
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

         <!-- Bottom bar -->
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/40">
                <p>&copy; {{ date('Y') }} OneGoBike. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="{{ url('/privacy-policy') }}" class="hover:text-white transition-colors duration-200">Privacy Policy</a>
                    <span class="opacity-40">·</span>
                    <a href="{{ url('/terms') }}" class="hover:text-white transition-colors duration-200">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>

    </footer>

         <!-- BACK-TO-TOP BUTTON -->
    <button
        id="back-to-top"
        type="button"
        aria-label="Back to top"
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-40 w-11 h-11 rounded-sm bg-[#132D6B] text-white shadow-md flex items-center justify-center hover:bg-[#2FA7FF] hover:-translate-y-1 transition-all duration-300"
    >
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
        </svg>
    </button>

     <!-- Back-to-top visibility script + scroll reveal  -->
    <script src="{{ asset('js/layout.js') }}"></script>

    <!-- Extra scripts slot  -->
    {{ $scripts ?? '' }}

</body>
</html>
