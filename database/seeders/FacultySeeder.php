<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::create(['name' => "Menejment va kab ta'limi fakulteti", "abbreviation" => "MK"]);
        Faculty::create(['name' => "Oziq-ovqat mahsulotlari texnologiyasi fakulteti", "abbreviation" => "OO"]);
        Faculty::create(['name' => "Noorganik moddalar texnologiyasi fakulteti", "abbreviation" => "NM"]);
        Faculty::create(['name' => "Yoqilg'i va organik birikmalar kimyoviy texnologiyasi fakulteti", "abbreviation" => "YO"]);
        Faculty::create(['name' => "Vinochilik texnologiyasi va sanoat uzumchiligi fakulteti", "abbreviation" => "VT"]);
    }
}
