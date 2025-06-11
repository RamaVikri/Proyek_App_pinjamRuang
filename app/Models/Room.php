<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'desc',
        'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getIsAvailableAttribute()
    {
        $now = now();

        return !$this->bookings()
            ->where('date', $now->toDateString())
            ->where('start', '<=', $now->format('H:i:s'))
            ->where('end', '>=', $now->format('H:i:s'))
            ->where('status', 'approved')
            ->exists();
    }
}
