<?php

namespace Database\Seeders;

use App\Models\BookTextType;
use Illuminate\Database\Seeder;

class BookTextTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookTextType::create([
            'name' => "matn",
            'status' => true,
        ]);
    }
}
