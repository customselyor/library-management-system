<?php

namespace App\Http\Livewire\Admin;

use App\Models\LanguageSetting;
use App\Models\MicroCategory;
use Livewire\Component;
use Livewire\WithPagination;

class MicroCategoryComponent extends Component
{
    protected $paginationTheme = 'bootstrap'; 
    use WithPagination;


    public $updateMode = false, $show_create = true, $is_update_mode = false, $is_view_mode = false;
    public $sortField = 'id', $perpage=10, $sortAsc = false, $search = '', $current_tab='uz';
    public $key, $image, $is_favorite, $status, $app_languges;
    // Translation
    public $locale, $micro_category_id, $micro_category=[], $title=[], $local=[];
    
    public function render()
    {
        $data = MicroCategory::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perpage);
        $this->app_languges=LanguageSetting::active()->get();
         

        return view('livewire.admin.micro-category-component', [
            'data' => $data
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
        $this->is_update_mode = false;
        $this->is_view_mode = false;
        $this->clearInputs();
        $this->show_create = true;
    }
    public function tabs($tabId){ 
        $this->current_tab=$tabId;
    }
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function clearInputs(){
        $this->title=null; 
    }
    public function store()
    {
       dd($this->micro_category);  
       
    }
}
