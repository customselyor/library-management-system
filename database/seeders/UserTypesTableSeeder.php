<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'name' => "Bakalavr",
            'status' => true,
        ]);
        UserType::create([
            'name' => "Magistr",
            'status' => true,
        ]);
        UserType::create([
            'name' => "O'qituvchi professor",
            'status' => true,
        ]);
        UserType::create([
            'name' => "No ma'lum",
            'status' => true,
        ]);
        UserType::create([
            'name' => "Hodim",
            'status' => true,
        ]);

    }
}
