document.addEventListener('alpine:init', () => {
    Alpine.data('volunteerForm', () => {
        const blank = () => ({
            firstName: '',
            lastName: '',
            email: '',
            phone: '',
            age: '',
            status: '',
            school: '',
            barangay: '',
            municipality: '',
            province: 'Pangasinan',
            interests: [],
            availability: '',
            hasBike: '',
            motivation: '',
            emergencyName: '',
            emergencyPhone: '',
            guardianName: '',
            guardianPhone: '',
            guardianConsent: false,
            agree: false,
        });

        return {
            form: blank(),
            loading: false,
            submitted: false,
            error: false,
            errorMessage: 'Something went wrong. Please try again.',

            // 'empty' | 'young' (<13) | 'minor' (13-17) | 'ok' (18-25) | 'old' (>25)
            get ageState() {
                const n = parseInt(this.form.age, 10);
                if (Number.isNaN(n)) return 'empty';
                if (n < 13) return 'young';
                if (n < 18) return 'minor';
                if (n <= 25) return 'ok';
                return 'old';
            },

            get isMinor() {
                return this.ageState === 'minor';
            },

            get canSubmit() {
                return this.ageState === 'minor' || this.ageState === 'ok';
            },

            async submitForm() {
                if (!this.canSubmit) return;

                this.error = false;
                this.loading = true;

                try {
                    // TODO: replace this simulated delay with the real POST once the backend exists
                    // const res = await fetch('/volunteer', {
                    //     method: 'POST',
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //         'Accept': 'application/json',
                    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                    //     },
                    //     body: JSON.stringify(this.form),
                    // });
                    // if (!res.ok) throw new Error('Request failed');
                    await new Promise(resolve => setTimeout(resolve, 1200));

                    this.submitted = true;
                    this.form = blank();
                } catch (e) {
                    this.error = true;
                    this.errorMessage = 'We could not send your application. Please try again later.';
                } finally {
                    this.loading = false;
                }
            },
        };
    });
});