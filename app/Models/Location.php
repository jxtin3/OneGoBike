<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'role',
        'designated_barangay',
        'latitude',
        'longitude',
        'status',
        'last_seen_at',
        'active_start_time',
        'active_end_time',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'last_seen_at' => 'datetime',
        'active_start_time' => 'datetime',
        'active_end_time' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
