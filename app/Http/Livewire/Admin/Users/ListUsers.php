<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Direction;
use App\Models\Faculty;
use App\Models\Gender;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ListUsers extends Component
{ 
    protected $paginationTheme = 'bootstrap';
    public $roles = null, $role_id, $name, $email, $password, $confirm_password, $user_id;
    public $isOpen = 0, $status=false;
    public $updateMode = false, $show_create = false, $is_update_mode = false, $current_step=1;
    public $phone_number,  $pnf_code, $passport_seria_number, $passport_copy, $image, $date_of_birth, $kursi, $klassi, $raqami,
        $qr_code, $faculty_id, $direction_id, $gender_id, $user_type_id, $genders, $faculties, $directions, $user_types;



    public function render()
    {
        $this->roles = Role::pluck('name', 'name')->all();
        $this->faculties = Faculty::all();
        $this->directions= Direction::all();
        $this->genders=Gender::all();
        $this->user_types=UserType::all();

        return view('livewire.admin.users.list-users', [
            'data' => User::orderBy('created_at', 'desc')->paginate(12)
        ])->layout('layouts.master');
    }
    public function ChangeCurrentStep($step){
        $this->current_step=$step;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {

        $this->resetInputFields();
        $this->openModal();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function clearInputs(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function firstForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'role_id' => 'required'
        ]);
        $this->ChangeCurrentStep(2);

    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            'faculty_id' => 'required',
            'role_id' => 'required',
            'gender_id' => 'required',
            'passport_seria_number' => 'required',
            'user_type_id' => 'required',
        ]);

       $data = [
           'password' => Hash::make($this->password),
           'name' => $this->name,
           'email' => $this->email,
       ];
       $user = User::create($data);
       $user->assignRole($this->role_id);
       $profile_data=[
        'phone_number' => $this->phone_number,
        'pnf_code' => $this->pnf_code,
        'passport_seria_number' => $this->passport_seria_number,
        'date_of_birth' => $this->date_of_birth,
        'kursi' => $this->kursi,
        'klassi' => User::GetKlassCodeFromRole($this->role_id),
        'raqami' => User::GetQRNumber(),
        'qr_code' => User::GetKlassCodeFromRole($this->role_id).'-'.User::GetQRNumber(),
        'faculty_id' => $this->faculty_id,
        'direction_id' => $this->direction_id,
        'gender_id' => $this->gender_id,
        'user_id' => $user->id,
        'user_type_id' => $this->user_type_id,
       ];
       $profile = UserProfile::create($profile_data);
       

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $this->company_id = $id;
        $this->title = $company->title;
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $this->company_id = $id;
        Company::find($id)->delete();
        session()->flash('message', 'Company deleted successfully.');
    }
    public function ShowHideCreate()
    {
        $this->clearInputs();
        $this->show_create = !$this->show_create;
    }
    public function HideCreate()
    {
        $this->clearInputs();
        $this->show_create = false;
    }

    public function ShowCreate()
    {
        $this->is_update_mode = false;
        $this->clearInputs();
        $this->show_create = true;
    }

}
