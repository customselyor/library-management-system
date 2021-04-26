<?php

namespace App\Http\Livewire\Admin;

use App\Models\Faculty;
use Livewire\Component;

class FacultiesComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.faculties-component',[
            'data'=>Faculty::orderBy('created_at', 'desc')->paginate(12)
        ])->layout('layouts.master');
    }
}
