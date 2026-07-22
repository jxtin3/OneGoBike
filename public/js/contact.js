document.addEventListener('alpine:init', () => {
    Alpine.data('contactForm', () => ({
        form: {
            name: '',
            email: '',
            subject: '',
            phone: '',
            message: '',
        },
        loading: false,
        submitted: false,
        error: false,
        errorMessage: 'Something went wrong. Please try again.',

        async submitForm() {
            this.error = false;
            this.loading = true;

            // Simulate async send (replace with real fetch/axios call as needed)
            await new Promise(resolve => setTimeout(resolve, 1400));

            try {
                // TODO: Replace with actual API endpoint
                // const res = await fetch('/api/contact', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content },
                //     body: JSON.stringify(this.form)
                // });
                // if (!res.ok) throw new Error('Network error');

                this.submitted = true;
                this.form = { name: '', email: '', subject: '', phone: '', message: '' };
            } catch (e) {
                this.error = true;
                this.errorMessage = 'Failed to send your message. Please try again later.';
            } finally {
                this.loading = false;
            }
        },
    }));
});
