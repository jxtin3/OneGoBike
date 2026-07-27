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
        showEmailReceipt: false,
        receiptEmail: '',
        form: {
            orgName: '', firstName: '', lastName: '', email: '',
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
            if (this.donorType === 'organization' && !f.orgName) return false;
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
