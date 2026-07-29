<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('donor_type')->default('individual');
            $table->string('org_name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->string('state');
            $table->string('country', 10);
            $table->decimal('amount_usd', 10, 2);
            $table->decimal('amount_php', 12, 2)->nullable();
            $table->decimal('platform_fee_usd', 8, 2)->default(0);
            $table->string('frequency')->default('once');
            $table->string('payment_method');
            $table->string('status')->default('pending');
            $table->string('paypal_order_id')->nullable();
            $table->string('paymongo_session_id')->nullable();
            $table->string('paymongo_payment_id')->nullable();
            $table->string('receipt_email')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
