<?php


namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;

class BookingForm extends Component
{
    public $room, $room_id, $date, $start, $end;

    public function mount()
    {
        $this->room = Room::all();
    }

    public function submitBooking()
    {
        $this->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'start' => 'required',
            'end' => 'required|after:start'
        ]);

        $startDateTime = Carbon::parse("{$this->date} {$this->start}");
        $endDateTime = Carbon::parse("{$this->date} {$this->end}");

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $this->room_id,
            'date' => $this->date,
            'start' => $startDateTime,
            'end' => $endDateTime,
            'status' => 'pending'
        ]);

        session()->flash('success', 'Peminjaman berhasil diajukan.');

        $this->reset(['room_id', 'date', 'start', 'end']);
        $this->dispatch('bookingSuccess');
    }

    public function render()
    {
        return view('livewire.user.booking-form', [
            'rooms' => $this->room,
        ]);
    }
}
