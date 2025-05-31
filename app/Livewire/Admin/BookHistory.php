<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;

class BookHistory extends Component
{
    public $bookings;
    public function mount()
    {
        $this->updateExpiredStatuses();
        $this->loadBookings();
    }
    public function loadBookings()
    {
        $this->bookings = Booking::with('user', 'room')->latest()->get();
    }
    public function render()
    {

        $donebookings = Booking::with(['user', 'room'])
            ->orderBy('date', 'desc')
            ->orderBy('start', 'desc')
            ->where('status', 'done')
            ->get();

        $rejectbookings = Booking::with(['user', 'room'])
            ->orderBy('date', 'desc')
            ->orderBy('start', 'desc')
            ->where('status', 'reject')
            ->get();

        return view(
            'livewire.admin.book-history',
            [
                'donebookings' => $donebookings,
                'rejectbookings' => $rejectbookings
            ]
        );
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
