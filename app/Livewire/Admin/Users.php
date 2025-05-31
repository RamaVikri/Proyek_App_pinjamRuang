<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use \Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginateTheme = 'bootstrap';
    public $paginate = '10';
    public $search = '';
    public $name, $user_id, $role;
    public function render()
    {
        $data = array(
            'title' => 'User',
            'users' => User::where('name', 'like', '%' . $this->search . '%')
                ->orwhere('email', 'like', '%' . $this->search . '%')
                ->orderBy('is_admin', 'desc')->paginate($this->paginate)
        );
        return view('livewire.admin.users', $data);
    }

    public function edit($id)
    {
        $this->resetValidation();
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->role = $user->is_admin ? '1' : '0';
        $this->user_id = $user->id;
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $this->validate(
            [
                'name' => 'required|unique:users,name,' . $id,
                'role' => 'required|in:0,1',

            ],
            [
                'name.required' => "Name can't be empty",
                'name.unique' => "Nama Telah dipanggil",
                'role.required' => "Type can't be empty",

            ]
        );

        $user->name = $this->name;
        $user->is_admin = $this->role == '1';
        $user->save();
        $this->dispatch('closedEditModal');
    }

    public function confirm($id)
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->role = $user->is_admin ? 'Admin' : 'User';
        $this->user_id = $user->id;
    }

    public function destory($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $this->dispatch('closedDeleteModal');
    }
}
