<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{

    public $name, $email;
    public $editMode = false;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function enableEdit()
    {
        $this->editMode = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        $this->editMode = false;
        session()->flash('success', 'Data berhasil diperbarui.');
    }
    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
