<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'name' => "Erkak",
            'status' => true,
        ]);
        Gender::create([
            'name' => "Ayol",
            'status' => true,
        ]);
    }
}
