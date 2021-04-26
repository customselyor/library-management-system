<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.admin.users.list-users',[
            'data'=>User::orderBy('created_at', 'desc')->paginate(12)
        ])->layout('layouts.master');
    }
}
