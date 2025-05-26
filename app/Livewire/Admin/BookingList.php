<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;

class BookingList extends Component
{
    public $bookings;

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
        return view('livewire.admin.booking-list');
    }
}
