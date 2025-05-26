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
    public function render()
    {
        $data = array(
            'user' => User::where('name', 'like', '%'.$this->search.'%')
            ->orwhere('email', 'like', '%'.$this->search.'%')
            ->orderBy('role', 'desc')-> paginate($this->paginate)
        );
        return view('livewire.admin.users', $data);
    }
}
 