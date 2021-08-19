<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Karimov Elyor', 
            'email' => 'karimovelyor@gmail.com',
            'password' => bcrypt('K@r!m0v1988')
        ]);
    
        $role = Role::create(['name' => 'SuperAdmin']);
        
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
        $role = Role::create(['name' => 'Admin']);
        $role = Role::create(['name' => 'Manager']);
        $role = Role::create(['name' => 'Reader']);
        $role = Role::create(['name' => 'User']);

    }
}
