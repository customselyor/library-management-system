<?php

namespace Database\Seeders;

use App\Models\BookText;
use Illuminate\Database\Seeder;

class BookTextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookText::create([
            'name' => "Lotin",
            'code' => "L",
            'status' => true,
        ]);
        BookText::create([
            'name' => "Kril",
            'code' => "K",
            'status' => true,
        ]);
    }
}
