<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;

class BookingList extends Component
{
    public $bookings, $room;
    public $search = '';


    public function mount()
    {
        $this->updateExpiredStatuses();
        $this->bookings = Booking::with('user', 'room')->latest()->get();
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        $room = Room::findOrFail($booking->room_id);
        $room->status = 'dipinjam';
        $room->save();
        $this->dispatch('bookingApproved');
    }

     public function updateExpiredStatuses()
    {
        $now = Carbon::now();

        Booking::where('status', 'approved')
            ->where('end', '<=', $now)
            ->update(['status' => 'completed']);

        Booking::where('status', 'pending')
            ->where('end', '<=', $now)
            ->update(['status' => 'rejected']);
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        $this->dispatch('bookingReject',);
    }


    public function render()
    {
        $pendingBookings = [
            'title' => 'Pending Booking',
            'pendingBookings' => Booking::with('room')->where('status', 'pending')
                ->latest()->get()
        ];

        $approvedBookings = [
            'title' => 'Approved Booking',
            'approvedBookings' => Booking::with('room')->where('status', 'approved')
                ->latest()->get()
        ];

        return view('livewire.admin.booking-list', $pendingBookings, $approvedBookings);
    }
}
