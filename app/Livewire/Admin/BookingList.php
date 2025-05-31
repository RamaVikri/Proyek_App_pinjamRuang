<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;

class BookingList extends Component
{
    public $bookings;
    public $search = '';


    public function mount()
    {
        $this->bookings = Booking::with('user', 'room')->latest()->get();
    }

    public function approve($id)
    {
        Booking::find($id)->update(['status' => 'approved']);
    }

    public function reject($id)
    {
        Booking::find($id)->update(['status' => 'rejected']);
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
