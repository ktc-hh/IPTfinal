<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'client_id',
        'package_id',
        'event_name',
        'event_date',
        'guest_count',
        'location',
        'status',
        'notes',
    ];

    protected $casts = [
        'event_date' => 'date',
        'guest_count' => 'integer',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
