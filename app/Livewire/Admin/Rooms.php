<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Confirm;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Bool_;

class Rooms extends Component
{

    public $name, $type, $desc, $room_id, $totalRooms;
    public $search = '';

    public function mount()
    {
        $this->totalRooms = Room::count();
    }

    public function render()
    {
        $now = Carbon::now();

        // mysql
        $rooms = Room::orderByRaw("FIELD(type, 'besar', 'sedang', 'kecil')")->get();

        // sqlite
        // $rooms = Room::with('bookings')->get();

        return view('livewire.admin.rooms', [
            'title' => 'Ruangan',
            'rooms' => $rooms
        ]);
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['name', 'type', 'desc']);
    }
    public function store()
    {
        $this->validate(
            [
                'name' => 'required|unique:rooms,name',
                'type' => 'required|in:besar,sedang,kecil',
                'desc' => 'required|min:25'

            ],
            [
                'name.required' => "Name can't be empty",
                'name.unique' => "Nama Telah dipanggil",
                'type.required' => "Type can't be empty",
                'type.in' => "Tipe diantara besar, sedang, kecil",
                'desc.required' => "Deskripsi must add",
                'desc.min' => "Deskripsi minimal 25 huruf",
            ]
        );

        $room = new Room;
        $room->name = $this->name;
        $room->type = $this->type;
        $room->desc = $this->desc;
        $room->save();

        $this->dispatch('closedCreatedModal');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $room = Room::findOrFail($id);
        $this->name = $room->name;
        $this->desc = $room->desc;
        $this->type = $room->type;
        $this->room_id = $room->id;
    }

    public function update($id)
    {
        $room = Room::findOrFail($id);
        $this->validate(
            [
                'name' => 'required|unique:rooms,name,' . $id,
                'type' => 'required|in:besar,sedang,kecil',
                'desc' => 'required|min:25'

            ],
            [
                'name.required' => "Name can't be empty",
                'name.unique' => "Nama Telah dipanggil",
                'type.required' => "Type can't be empty",
                'type.in' => "Tipe diantara besar, sedang, kecil",
                'desc.required' => "Deskripsi must add",
                'desc.min' => "Deskripsi minimal 25 huruf",
            ]
        );

        $room->name = $this->name;
        $room->type = $this->type;
        $room->desc = $this->desc;
        $room->save();
        $this->dispatch('closedEditModal');

    }

    public function confirm($id){
        $room = Room::findOrFail($id);
        $this->name =$room->name;
        $this->type =$room->type;
        $this->room_id =$room->id;

    }

    public function destroy($id){
        $room = Room::findOrFail($id);
        $room->delete();
        $this->dispatch('closedDeleteModal');

    }
}
