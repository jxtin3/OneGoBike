<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->string('designated_barangay')->nullable()->after('role');
            $table->timestamp('last_seen_at')->nullable()->after('status')->index();
            $table->timestamp('active_start_time')->nullable()->after('last_seen_at');
            $table->timestamp('active_end_time')->nullable()->after('active_start_time');
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropUnique(['user_id']);
            $table->dropColumn([
                'designated_barangay',
                'last_seen_at',
                'active_start_time',
                'active_end_time',
            ]);
        });
    }
};