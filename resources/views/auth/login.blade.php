<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/gobike-logo.png') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#0D1B2A] antialiased">
    <div
        class="relative min-h-screen w-full"
        style="background-image: linear-gradient(180deg, rgba(13,27,42,.25) 0%, rgba(13,27,42,.45) 100%), url('{{ asset('images/guitar-bg.jpg') }}'); background-size: cover; background-position: top center;"
    >
        <!-- logo -->
        <div class="absolute left-6 top-6 sm:left-20 sm:top-10">
            <img
                src="{{ asset('images/logo(nobg).png') }}"
                alt="OneGoBike"
                class="h-24 w-auto drop-shadow-[0_2px_10px_rgba(0,0,0,0.5)] sm:h-32 lg:h-30"
            >
        </div>

        {{-- Tagline, bottom-left --}}
        <p class="absolute bottom-6 left-6 max-w-xs text-sm text-white/80 [text-shadow:0_2px_10px_rgba(0,0,0,.5)] sm:bottom-8 sm:left-25">
            Community health responders serving Pangasinan since 2019.
        </p>

        {{-- Credentials panel — glass card, anchored right on wide screens --}}
        <div class="flex min-h-screen items-center justify-center px-6 py-12 lg:justify-end lg:px-16 xl:px-24">
            <div class="login-panel-enter w-full max-w-md rounded-3xl border border-white/40 bg-white/80 p-8 shadow-2xl shadow-black/20 backdrop-blur-2xl sm:p-10">

                <h1 class="font-heading text-2xl font-semibold text-[#0D1B2A] sm:text-3xl">
                    Admin sign in
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Manage donations, news, and volunteer operations for Go Bike Project.
                </p>

                @if ($errors->any())
                    <div class="mt-6 rounded-lg border border-rose-200 bg-rose-50/90 px-4 py-3 text-sm text-rose-700" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-[#0D1B2A]">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                            placeholder="you@padyarescue.org"
                            class="mt-1.5 block w-full rounded-lg border border-slate-200 bg-white/70 px-3.5 py-2.5 text-sm text-[#0D1B2A] placeholder:text-slate-400 focus:border-[#0D1B2A] focus:outline-none focus:ring-2 focus:ring-[#0D1B2A]/10"
                        >
                    </div>

                    <div x-data="{ show: false }">
                        <label for="password" class="block text-sm font-medium text-[#0D1B2A]">Password</label>
                        <div class="relative mt-1.5">
                            <input
                                x-ref="password"
                                type="password"
                                id="password"
                                name="password"
                                autocomplete="current-password"
                                required
                                placeholder="••••••••"
                                class="block w-full rounded-lg border border-slate-200 bg-white/70 px-3.5 py-2.5 pr-10 text-sm text-[#0D1B2A] placeholder:text-slate-400 focus:border-[#0D1B2A] focus:outline-none focus:ring-2 focus:ring-[#0D1B2A]/10"
                            >
                            <button
                                type="button"
                                @click="show = !show; $refs.password.type = show ? 'text' : 'password'"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-slate-400 hover:text-[#0D1B2A]"
                                :aria-label="show ? 'Hide password' : 'Show password'"
                            >
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                    <line x1="1" y1="1" x2="23" y2="23"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <label class="flex items-center gap-2 pt-1 text-sm text-slate-600">
                        <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 accent-orange-500">
                        Remember me
                    </label>

                    <button
                        type="submit"
                        class="mt-2 w-full rounded-lg bg-orange-500 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-orange-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500/40 focus-visible:ring-offset-2"
                    >
                        Sign in
                    </button>
                </form>

                <p class="mt-8 text-xs text-slate-500">
                    Access is limited to PadyaRescue, Inc. administrators.
                </p>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="{{ asset('js/alpine-intersect.min.js') }}"></script>
    <script defer src="{{ asset('js/alpine-collapse.min.js') }}"></script>
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>

</body>
</html>