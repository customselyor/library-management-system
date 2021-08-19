<?php

namespace App\Http\Livewire\Admin;

use App\Models\LanguageSettings;
use Livewire\Component;
use Livewire\WithPagination;

class LanguageSettingsComponent extends Component
{

    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public $updateMode = false, $show_create = false, $is_update_mode = false, $is_view_mode = false;
    public $count = 5;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
    public function render()
    {
        return view('livewire.admin.language-settings-component',[
            'data'=>LanguageSettings::orderBy('created_at', 'desc')->paginate(12)
        ])->layout('layouts.master');

    }
    public function ShowHideCreate()
    {
        $this->clearInputs();
        $this->show_create = !$this->show_create;
        $this->is_view_mode = false;
    }

    public function HideCreate()
    {
        $this->clearInputs();
        $this->show_create = false;
        $this->is_view_mode = false;
    }

    public function ShowCreate()
    {
        dd(1);
        $this->is_update_mode = false;
        $this->is_view_mode = false;
        $this->clearInputs();
        $this->show_create = true;
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function clearInputs(){
        $this->code=null;
        $this->title=null;
    }
}
