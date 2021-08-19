<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::create([
            'name' => "Menejment va kasb ta'lim",
            'abbreviation' => "MK", 
        ]);
        Faculty::create([
            'name' => "Oziq ovqat mahsulotlari texnalogiyasi",
            'abbreviation' => "OO", 
        ]);
        Faculty::create([
            'name' => "Noorganik moddalar texnalogiyasi",
            'abbreviation' => "NM", 
        ]);
        Faculty::create([
            'name' => "Yoqilg'i va organik birikmalar",
            'abbreviation' => "YO", 
        ]);
        Faculty::create([
            'name' => "Vinochilik texnalogiyasi va sanoat uzumchilik",
            'abbreviation' => "VT", 
        ]);
        Faculty::create([
            'name' => "Talabalar yotoqxonasi",
            'abbreviation' => "TY", 
        ]);
        
    }
}
