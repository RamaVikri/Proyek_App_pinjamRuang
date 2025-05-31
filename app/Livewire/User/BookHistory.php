<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BookHistory extends Component
{
    public function render()
    {
        $this->updateExpiredStatuses();
        
        return view('livewire.user.book-history', [
        'bookings' => Booking::where('user_id', Auth::id())->latest()->paginate(10)
    ]);
    }

    public function updateExpiredStatuses()
    {
        $now = Carbon::now();

        Booking::where('status', 'approved')
            ->where('end', '<=', $now)
            ->update(['status' => 'done']);

        Booking::where('status', 'pending')
            ->where('end', '<=', $now)
            ->update(['status' => 'reject']);
    }
}
