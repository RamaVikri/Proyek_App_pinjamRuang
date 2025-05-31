<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'room_id', 'date', 'start', 'end', 'status'];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusWaktuAttribute()
    {
        $now = now();
        $start = Carbon::parse("{$this->date} {$this->start}");
        $end = Carbon::parse("{$this->date} {$this->end}");

        if ($now->lt($start)) {
            return 'Akan datang';
        } elseif ($now->between($start, $end)) {
            return 'Berlangsung';
        } else {
            return 'Selesai';
        }
    }
}
