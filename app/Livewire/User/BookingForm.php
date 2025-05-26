<?php


namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Room;
use App\Models\Booking;

class BookingForm extends Component
{
    public $room, $room_id, $date, $time;

    public function mount(){
        $this->room = Room::all();
    }

    public function submit(){
        $this->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $this->room_id,
            'date' =>$this->date,
            'time' => $this->time,
            'status' => 'pending'
        ]);

        session()->flash('message', 'request has been sent');

        $this->reset(['room_id', 'date', 'time']);
    }

    public function render()
    {
        return view('livewire.user.booking-form', [
            'rooms' => \App\Models\Room::all(),
        ]);
    }
}
