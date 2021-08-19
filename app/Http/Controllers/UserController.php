<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Direction;
use App\Models\UserType;
use App\Models\Gender;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Role::pluck('name', 'name')->all();
        $faculties = Faculty::all();
        $directions= Direction::all();
        $genders=Gender::all();
        $user_types=UserType::all();

        return view('users.create', compact('user', 'roles', 'faculties','directions','genders','user_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules=[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'file' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048', // 2MB Max
            'password_confirmation' => 'min:6',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            'faculty_id' => 'required',
            'role_id' => 'required',
            'gender_id' => 'required',
            'passport_seria_number' => 'required',
            'user_type_id' => 'required',
        ];
        request()->validate($rules);

       $data = [
           'password' => Hash::make($request->input('password')),
           'name' => $request->input('name'),
           'email' => $request->input('email'),
       ];

       DB::transaction(function () use ($request, $data)  {

            $user = User::create($data);
            $user->assignRole($request->input('role_id'));
            $user_image_name='';
            if($request->file('file')) {
                $user_image_name = Auth::id().'_'.uniqid().'_'.time().'.'.$request->file('file')->getClientOriginalExtension();
                $filePath = $request->file('file')->storeAs('user/avatar', $user_image_name, 'public');
            }
            $profile_data=[
                    'phone_number' => $request->input('phone_number'),
                    'pnf_code' => $request->input('pnf_code'),
                    'passport_seria_number' => $request->input('passport_seria_number'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'kursi' => $request->input('kursi'),
                    'klassi' => User::GetKlassCodeFromRole($request->input('role_id')),
                    'raqami' => User::GetQRNumber(),
                    'qr_code' => User::GetKlassCodeFromRole($request->input('role_id')).'-'.User::GetQRNumber(),
                    'faculty_id' => $request->input('faculty_id'),
                    'direction_id' => $request->input('direction_id'),
                    'gender_id' => $request->input('gender_id'),
                    'image' => $user_image_name,
                    'user_id' => $user->id,
                    'user_type_id' => $request->input('user_type_id'),
            ];
            $profile = UserProfile::create($profile_data);
        }, 5);
        return redirect()->route('users.index')
        ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $books_count = Book::where('created_by', '=', $id)
            ->get()->count();
        return view('users.show', compact('user', 'books_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $faculties = Faculty::all();
        $directions= Direction::all();
        $genders=Gender::all();
        $user_types=UserType::all();

        return view('users.edit', compact('user', 'roles', 'faculties','directions','genders','user_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $rules=[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            'faculty_id' => 'required',
            'role_id' => 'required',
            'gender_id' => 'required',
            'passport_seria_number' => 'required',
            'user_type_id' => 'required',
        ];
        request()->validate($rules);

        $data = [
            'password' => Hash::make($request->input('password')),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        DB::transaction(function () use ($request, $data, $user)  {
            $user->update($data);
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();
    
            $user->assignRole($request->input('role_id'));
            $user_image_name='';
            if($request->file('file')) {
                $user_image_name = Auth::id().'_'.uniqid().'_'.time().'.'.$request->file('file')->getClientOriginalExtension();
                $filePath = $request->file('file')->storeAs('user/avatar', $user_image_name, 'public');
            }
            $profile_data=[
                    'phone_number' => $request->input('phone_number'),
                    'pnf_code' => $request->input('pnf_code'),
                    'passport_seria_number' => $request->input('passport_seria_number'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'kursi' => $request->input('kursi'),
                    // 'klassi' => User::GetKlassCodeFromRole($request->input('role_id')),
                    // 'raqami' => User::GetQRNumber(),
                    // 'qr_code' => User::GetKlassCodeFromRole($request->input('role_id')).'-'.User::GetQRNumber(),
                    'faculty_id' => $request->input('faculty_id'),
                    'direction_id' => $request->input('direction_id'),
                    'gender_id' => $request->input('gender_id'),
                    'image' => $user_image_name,

                    'user_id' => $user->id,
                    'user_type_id' => $request->input('user_type_id'),
            ];
            $profile = UserProfile::where('user_id', '=', $user->id)->firstOrfail();
            $profile->update($profile_data);
        }, 5);
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
