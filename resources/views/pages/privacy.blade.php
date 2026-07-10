<x-layout title="Privacy Policy - OneGoBike">
    <section class="bg-[#0D1B2A] min-h-screen pt-32 md:pt-40 pb-20 text-white relative overflow-hidden">
        <!-- Decorative blobs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#2FA7FF]/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#F97316]/10 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-heading font-bold text-white mb-4">Privacy Policy</h1>
            <p class="text-[#2FA7FF] font-semibold tracking-wide text-sm mb-12 uppercase">Last updated: {{ date('F d, Y') }}</p>

            <div class="space-y-8 text-white/75 leading-relaxed">
                <div>
                    <h2 class="text-2xl font-heading font-bold text-white mb-3">1. Information We Collect</h2>
                    <p>We collect information that you provide directly to us when you volunteer, donate, or contact us. This may include your name, email address, phone number, and any other information you choose to provide.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-heading font-bold text-white mb-3">2. How We Use Your Information</h2>
                    <p>We use the information we collect to operate our programs, communicate with you, process donations, and improve our community services across Pangasinan.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-heading font-bold text-white mb-3">3. Sharing of Information</h2>
                    <p>We do not share your personal information with third parties except as necessary to provide our services, coordinate with our government partners (such as DILG or DOH), or comply with the law.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-heading font-bold text-white mb-3">4. Security</h2>
                    <p>We take reasonable measures to help protect your personal information from loss, theft, misuse, and unauthorized access, disclosure, alteration, and destruction.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-heading font-bold text-white mb-3">5. Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact our community desk at <a href="{{ url('/contact') }}" class="text-[#2FA7FF] hover:text-white transition-colors underline underline-offset-4">our contact page</a>.</p>
                </div>
            </div>
        </div>
    </section>
</x-layout>

