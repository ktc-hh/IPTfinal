<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price_per_person',
        'min_guests',
        'max_guests',
        'style',
        'featured',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
