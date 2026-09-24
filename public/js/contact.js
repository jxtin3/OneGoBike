document.addEventListener('alpine:init', () => {
    Alpine.data('contactForm', () => ({
        form: {
            name: '',
            email: '',
            subject: '',
            otherConcern: '',
            phone: '',
            message: '',
        },
        loading: false,
        submitted: false,
        error: false,
        errorMessage: 'Something went wrong. Please try again.',


        init() {
            // Reset the form only when the user chooses to send another message
            this.$watch('submitted', (value) => {
                if (!value) {
                    this.form = { name: '', email: '', subject: '', otherConcern: '', phone: '', message: '' };
                }
            });
        },

        async submitForm() {
            this.error = false;
            this.loading = true;

            try {
                const res = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                    },
                    body: JSON.stringify(this.form),
                });

                if (!res.ok) throw new Error('Request failed');

                this.submitted = true;
                // this.form = { name: '', email: '', subject: '', otherConcern: '', phone: '', message: '' };
            } catch (e) {
                this.error = true;
                this.errorMessage = 'Failed to send your message. Please try again later.';
            } finally {
                this.loading = false;
            }
        },
    }));
});
