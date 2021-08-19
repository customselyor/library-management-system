<?php

namespace Database\Seeders;

use App\Models\BookLanguage;
use App\Models\LanguageSetting;

use Illuminate\Database\Seeder;

class BookLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookLanguage::create([
            'name' => "O'zbekcha",
            'code' => "uz",
            'status' => true,
        ]);
        BookLanguage::create([
            'name' => "Ruscha",
            'code' => "ru",
            'status' => true,
        ]);
        BookLanguage::create([
            'name' => "Inglizcha",
            'code' => "en",
            'status' => true,
        ]);
        
        BookLanguage::create([
            'name' => "Nemischa",
            'code' => "de",
            'status' => true,
        ]);

        LanguageSetting::create([
            'title' => "O'zbekcha",
            'code' => "uz",
            'status' => true,
        ]);
        LanguageSetting::create([
            'title' => "Russian",
            'code' => "ru",
            'status' => true,
        ]);

        

    }
}
