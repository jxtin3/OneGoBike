<x-layout
    title="Donate - OneGoBike"
    description="Support OneGoBike by donating today. Your generous contribution helps provide life-changing bicycles and community services to people around the world."
>

{{-- Full-page donate wrapper --}}
<div
    class="donate-page"
    x-data="donateApp()"
    x-init="init()"
>

    <div class="donate-bg">
        <img
            src="{{ asset('images/c5.jpg') }}"
            alt="Bicycle rider on a dusty path"
            class="donate-bg__img"
        />
        <div class="donate-bg__overlay"></div>
    </div>

         <!-- LEFT  — Hero text -->
    <div class="donate-hero">
        <div class="donate-hero__content">
            <h1 class="donate-hero__title">Give The Power<br>Of Bicycles</h1>
            <p class="donate-hero__sub">
                Your generous support helps provide life-changing<br>
                bicycles to people around the world!
            </p>

            {{-- Share bar --}}
            <div class="donate-share">
                <span class="donate-share__label">Share</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/donate')) }}" target="_blank" rel="noopener" class="donate-share__btn donate-share__btn--fb" aria-label="Share on Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url('/donate')) }}&text=Support+OneGoBike" target="_blank" rel="noopener" class="donate-share__btn donate-share__btn--x" aria-label="Share on X">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
                <a href="https://wa.me/?text={{ urlencode('Support OneGoBike: '.url('/donate')) }}" target="_blank" rel="noopener" class="donate-share__btn donate-share__btn--wa" aria-label="Share on WhatsApp">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
                <a href="mailto:?subject=Support+OneGoBike&body={{ urlencode(url('/donate')) }}" class="donate-share__btn donate-share__btn--mail" aria-label="Share via Email">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url('/donate')) }}" target="_blank" rel="noopener" class="donate-share__btn donate-share__btn--li" aria-label="Share on LinkedIn">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                <button class="donate-share__btn donate-share__btn--link" aria-label="Copy link" @click="copyLink()">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                </button>
            </div>
        </div>
    </div>

         <!-- RIGHT — Floating card -->
    <div class="donate-card-wrap">
        <div class="donate-card">

            {{-- Step indicator --}}
            <div class="donate-steps">
                <template x-for="n in 3" :key="n">
                    <button
                        class="donate-step"
                        :class="{ 'is-active': step === n, 'is-done': step > n }"
                        @click="step > n ? step = n : null"
                        :disabled="step < n"
                        :aria-label="'Step ' + n"
                    >
                        <span x-text="n"></span>
                    </button>
                </template>
            </div>

            {{-- ---- STEP 1: Amount ---- --}}
            <div x-show="step === 1" x-transition:enter="donate-step-enter" x-transition:enter-start="donate-step-enter-start" x-transition:enter-end="donate-step-enter-end">
                <div class="donate-card__header">
                    <h2 class="donate-card__title">I'd like to make this donation</h2>
                    <p class="donate-card__sub">This donation is in USD</p>
                </div>

                {{-- Once / Monthly toggle --}}
                <div class="donate-freq">
                    <button
                        id="freq-once"
                        class="donate-freq__btn"
                        :class="{ 'is-active': freq === 'once' }"
                        @click="freq = 'once'"
                    >Once</button>
                    <button
                        id="freq-monthly"
                        class="donate-freq__btn"
                        :class="{ 'is-active': freq === 'monthly' }"
                        @click="freq = 'monthly'"
                    >Monthly</button>
                </div>

                {{-- Preset amounts --}}
                <div class="donate-amounts">
                    <template x-for="amt in presets" :key="amt">
                        <button
                            class="donate-amount__btn"
                            :class="{ 'is-active': amount === amt && !customMode }"
                            @click="selectPreset(amt)"
                            x-text="'$' + amt"
                        ></button>
                    </template>
                </div>

                {{-- Custom amount --}}
                <div class="donate-custom">
                    <span class="donate-custom__symbol">$</span>
                    <input
                        id="custom-amount"
                        type="number"
                        min="1"
                        placeholder="Other Amount"
                        class="donate-custom__input"
                        x-model="customAmount"
                        @focus="customMode = true"
                        @input="customMode = true; amount = parseFloat(customAmount) || 0"
                    />
                </div>

                <button
                    id="donate-step1-btn"
                    class="donate-cta"
                    @click="goStep2()"
                    :disabled="effectiveAmount <= 0"
                >Donate</button>
            </div>

            {{-- ---- STEP 2: Your Details ---- --}}
            <div x-show="step === 2" x-transition:enter="donate-step-enter" x-transition:enter-start="donate-step-enter-start" x-transition:enter-end="donate-step-enter-end">
                <div class="donate-card__header">
                    <h2 class="donate-card__title">Your Details</h2>
                    <p class="donate-card__sub">This donation is in USD</p>
                </div>

                {{-- Individual / Organization --}}
                <div class="donate-freq">
                    <button
                        id="donor-individual"
                        class="donate-freq__btn"
                        :class="{ 'is-active': donorType === 'individual' }"
                        @click="donorType = 'individual'"
                    >Individual</button>
                    <button
                        id="donor-organization"
                        class="donate-freq__btn"
                        :class="{ 'is-active': donorType === 'organization' }"
                        @click="donorType = 'organization'"
                    >Organization</button>
                </div>

                <div class="donate-form">
                    <div class="donate-form__row">
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="first-name">First Name <span class="req">*</span></label>
                            <input id="first-name" type="text" class="donate-form__input" x-model="form.firstName" autocomplete="given-name" />
                        </div>
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="last-name">Last Name <span class="req">*</span></label>
                            <input id="last-name" type="text" class="donate-form__input" x-model="form.lastName" autocomplete="family-name" />
                        </div>
                    </div>

                    <div class="donate-form__group">
                        <label class="donate-form__label" for="email">Email <span class="req">*</span></label>
                        <input id="email" type="email" class="donate-form__input" x-model="form.email" autocomplete="email" />
                    </div>

                    <div class="donate-form__group">
                        <label class="donate-form__label" for="phone">Phone</label>
                        <input id="phone" type="tel" class="donate-form__input" x-model="form.phone" autocomplete="tel" />
                    </div>

                    <h3 class="donate-form__section-title">Postal Address</h3>

                    <div class="donate-form__row">
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="addr1">Address Line 1 <span class="req">*</span></label>
                            <input id="addr1" type="text" class="donate-form__input" placeholder="Street address, P.O. box" x-model="form.address1" autocomplete="address-line1" />
                        </div>
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="addr2">Address Line 2</label>
                            <input id="addr2" type="text" class="donate-form__input" placeholder="Apartment, suite, unit, bldg" x-model="form.address2" autocomplete="address-line2" />
                        </div>
                    </div>

                    <div class="donate-form__row">
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="city">City <span class="req">*</span></label>
                            <input id="city" type="text" class="donate-form__input" x-model="form.city" autocomplete="address-level2" />
                        </div>
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="postcode">Postcode <span class="req">*</span></label>
                            <input id="postcode" type="text" class="donate-form__input" x-model="form.postcode" autocomplete="postal-code" />
                        </div>
                    </div>

                    <div class="donate-form__row">
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="state">State <span class="req">*</span></label>
                            <input id="state" type="text" class="donate-form__input" x-model="form.state" autocomplete="address-level1" />
                        </div>
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="country">Country <span class="req">*</span></label>
                            <select id="country" class="donate-form__select" x-model="form.country" autocomplete="country">
                                <option value="PH">Philippines</option>
                                <option value="US">United States</option>
                                <option value="GB">United Kingdom</option>
                                <option value="AU">Australia</option>
                                <option value="CA">Canada</option>
                                <option value="SG">Singapore</option>
                                <option value="JP">Japan</option>
                                <option value="DE">Germany</option>
                                <option value="FR">France</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="donate-card__actions">
                    <button class="donate-back" @click="step = 1" aria-label="Back to step 1">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </button>
                    <button
                        id="donate-step2-btn"
                        class="donate-cta donate-cta--flex"
                        @click="goStep3()"
                        :disabled="!step2Valid()"
                    >Payment Options</button>
                </div>
            </div>

            {{-- ---- STEP 3: Payment ---- --}}
            <div x-show="step === 3" x-transition:enter="donate-step-enter" x-transition:enter-start="donate-step-enter-start" x-transition:enter-end="donate-step-enter-end">
                <div class="donate-card__header">
                    <h2 class="donate-card__title">Payment Details</h2>
                    <p class="donate-card__sub">This donation is in USD</p>
                </div>

                {{-- Secure badge --}}
                <div class="donate-secure">
                    <svg class="donate-secure__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C7 2 3 6 3 6v6c0 5.25 3.75 9.74 9 11 5.25-1.26 9-5.75 9-11V6s-4-4-9-4z"/><path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4"/></svg>
                    <span>Secure, fast checkout with Link</span>
                    <svg class="donate-secure__chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </div>

                <div class="donate-form">
                    {{-- Card number --}}
                    <div class="donate-form__group">
                        <label class="donate-form__label" for="card-number">Card number</label>
                        <div class="donate-form__card-wrap">
                            <input
                                id="card-number"
                                type="text"
                                inputmode="numeric"
                                class="donate-form__input donate-form__input--card"
                                placeholder="1234 1234 1234 1234"
                                maxlength="19"
                                x-model="card.number"
                                @input="formatCard($event)"
                            />
                            <div class="donate-form__card-brands">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/800px-Mastercard-logo.svg.png" alt="Mastercard" class="donate-brand-icon">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/800px-Visa_Inc._logo.svg.png" alt="Visa" class="donate-brand-icon">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/800px-American_Express_logo_%282018%29.svg.png" alt="Amex" class="donate-brand-icon">
                                <span class="donate-brand-jcb">JCB</span>
                            </div>
                        </div>
                    </div>

                    {{-- Expiry + CVV --}}
                    <div class="donate-form__row">
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="expiry">Expiration date</label>
                            <input
                                id="expiry"
                                type="text"
                                inputmode="numeric"
                                class="donate-form__input"
                                placeholder="MM / YY"
                                maxlength="7"
                                x-model="card.expiry"
                                @input="formatExpiry($event)"
                            />
                        </div>
                        <div class="donate-form__group">
                            <label class="donate-form__label" for="cvc">Security code</label>
                            <div class="donate-form__cvc-wrap">
                                <input
                                    id="cvc"
                                    type="text"
                                    inputmode="numeric"
                                    class="donate-form__input donate-form__input--cvc"
                                    placeholder="CVC"
                                    maxlength="4"
                                    x-model="card.cvc"
                                />
                                <svg class="donate-form__cvc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/><path d="M6 15h3M11 15h2"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Country --}}
                    <div class="donate-form__group">
                        <label class="donate-form__label" for="billing-country">Country</label>
                        <select id="billing-country" class="donate-form__select" x-model="card.country">
                            <option value="PH">Philippines</option>
                            <option value="US">United States</option>
                            <option value="GB">United Kingdom</option>
                            <option value="AU">Australia</option>
                            <option value="CA">Canada</option>
                            <option value="SG">Singapore</option>
                        </select>
                    </div>

                    {{-- Platform cost cover --}}
                    <div class="donate-platform">
                        <label class="donate-form__label" for="platform-cost">
                            Cover platform costs
                        </label>
                        <select id="platform-cost" class="donate-form__select" x-model="platformFee">
                            <option value="1.88">$1.88</option>
                            <option value="0">No thanks</option>
                        </select>
                    </div>
                </div>

                {{-- Donate CTA --}}
                <div class="donate-card__actions">
                    <button class="donate-back" @click="step = 2" aria-label="Back to step 2">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                    </button>
                    <button
                        id="donate-submit-btn"
                        class="donate-cta donate-cta--flex"
                        @click="submit()"
                        :disabled="!step3Valid()"
                    >
                        <span>Donate </span>
                        <span x-text="'$' + totalAmount.toFixed(2)"></span>
                    </button>
                </div>
            </div>

            {{-- ---- STEP 4: Thank-you ---- --}}
            <div x-show="step === 4" x-transition:enter="donate-step-enter" x-transition:enter-start="donate-step-enter-start" x-transition:enter-end="donate-step-enter-end">
                <div class="donate-thankyou">
                    <div class="donate-thankyou__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                    </div>
                    <h2 class="donate-thankyou__title">Thank You!</h2>
                    <p class="donate-thankyou__sub">
                        Your donation of <strong x-text="'$' + totalAmount.toFixed(2)"></strong> has been received.<br>
                        Together, we're giving the power of bicycles to the world.
                    </p>
                    <a href="{{ url('/') }}" class="donate-cta donate-cta--center">Back to Home</a>
                </div>
            </div>

        </div>{{-- /donate-card --}}
    </div>{{-- /donate-card-wrap --}}

</div>{{-- /donate-page --}}

<x-slot:scripts>
<script>
function donateApp() {
    return {
        step:         1,
        freq:         'once',
        presets:      [25, 50, 165, 1000],
        amount:       25,
        customMode:   false,
        customAmount: '',
        donorType:    'individual',
        platformFee:  1.88,
        form: {
            firstName: '', lastName: '', email: '',
            phone: '', address1: '', address2: '',
            city: '', postcode: '', state: '', country: 'PH',
        },
        card: {
            number: '', expiry: '', cvc: '', country: 'PH',
        },

        init() {},

        get effectiveAmount() {
            return this.customMode ? (parseFloat(this.customAmount) || 0) : this.amount;
        },

        get totalAmount() {
            return this.effectiveAmount + parseFloat(this.platformFee || 0);
        },

        selectPreset(amt) {
            this.amount     = amt;
            this.customMode = false;
            this.customAmount = '';
        },

        goStep2() {
            if (this.effectiveAmount > 0) this.step = 2;
        },

        goStep3() {
            if (this.step2Valid()) this.step = 3;
        },

        step2Valid() {
            const f = this.form;
            return f.firstName && f.lastName && f.email && f.address1 && f.city && f.postcode && f.state;
        },

        step3Valid() {
            const c = this.card;
            return c.number.replace(/\s/g,'').length >= 13 && c.expiry.length >= 5 && c.cvc.length >= 3;
        },

        formatCard(e) {
            let v = e.target.value.replace(/\D/g,'').slice(0,16);
            this.card.number = v.replace(/(.{4})/g,'$1 ').trim();
        },

        formatExpiry(e) {
            let v = e.target.value.replace(/\D/g,'').slice(0,4);
            if (v.length >= 3) v = v.slice(0,2) + ' / ' + v.slice(2);
            this.card.expiry = v;
        },

        submit() {
            if (!this.step3Valid()) return;
            this.step = 4;
        },

        copyLink() {
            navigator.clipboard.writeText(window.location.href).catch(() => {});
        },
    };
}
</script>
</x-slot:scripts>

</x-layout>
