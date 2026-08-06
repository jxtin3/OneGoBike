<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Donation extends Model
{
    protected $fillable = [
        'uuid',
        'donor_type',
        'org_name',
        'first_name', 'last_name',
        'email',
        'phone',
        'address1', 'address2',
        'city',
        'postcode',
        'state', 'country',
        'amount_usd', 'amount_php',
        'platform_fee_usd',
        'frequency',
        'payment_method',
        'status',
        'paypal_order_id', 'paypal_subscription_id',
        'paymongo_session_id', 'paymongo_payment_id',
        'receipt_email',
    ];

    protected function casts(): array
    {
        return [
            'amount_usd' => 'decimal:2',
            'amount_php' => 'decimal:2',
            'platform_fee_usd' => 'decimal:2',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Donation $donation) {
            if (empty($donation->uuid)) {
                $donation->uuid = (string) Str::uuid();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function getTotalUsdAttribute(): float
    {
        return (float) $this->amount_usd + (float) $this->platform_fee_usd;
    }

    public function getDonorNameAttribute(): string
    {
        if ($this->donor_type === 'organization' && $this->org_name) {
            return $this->org_name;
        }

        return trim("{$this->first_name} {$this->last_name}");
    }

    public function markPaid(?string $gatewayPaymentId = null): void
    {
        $updates = ['status' => 'paid'];

        if ($gatewayPaymentId && $this->payment_method !== 'paypal') {
            $updates['paymongo_payment_id'] = $gatewayPaymentId;
        }

        $this->update($updates);
    }
}
