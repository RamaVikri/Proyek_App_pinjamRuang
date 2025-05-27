<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;

class Rooms extends Component
{

    public $name, $type, $desc;
    public $search = '';

    public function render()
    {
        // mysql
        // $rooms = array(
        //     'rooms' => Room::orderByRaw("FIELD(type, 'besar', 'sedang', 'kecil')")->get()
        // );

        // sqlite
        $rooms = [
            'title' => 'Ruangan',
            'rooms' => Room::where('name', 'like', '%'.$this->search.'%')
            ->orderByRaw("
                            CASE
                                WHEN type = 'besar' THEN 1
                                WHEN type = 'sedang' THEN 2
                                WHEN type = 'kecil' THEN 3
                                ELSE 4
                            END
                        ")->get()
        ];
        return view('livewire.admin.rooms', $rooms);
    }

    public function create(){
        $this->resetValidation();
        $this->reset(['name', 'type', 'desc']);
    }
    public function store(){
        $this->validate([
            'name' => 'required',
            'type' => 'required|in:besar,sedang,kecil',
            'desc' => 'required|min:25'

        ],
    [
        'name.required' => "Name can't be empty",
        'type.required' => "Type can't be empty",
        'type.in' => "Tipe diantara besar, sedang, kecil",
        'desc.required' => "Deskripsi must add",
        'desc.min' => "Deskripsi minimal 25 huruf",
    ]);

    $room = new Room;
    $room->name = $this->name;
    $room->type = $this->type;
    $room->desc = $this->desc;
    $room->save();

    $this->dispatch('closedCreatedModal');
    }
}
