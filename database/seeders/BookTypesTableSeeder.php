<?php

namespace Database\Seeders;

use App\Models\BookType;
use Illuminate\Database\Seeder;

class BookTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookType::create([
            'name' => 'Darslik',
            'code' => 'D',
            'status' => true,
        ]);
        BookType::create([
            'name' => "O'quv qo'llanma",
            'code' => "O'.q",
            'status' => true,
        ]);
        
        BookType::create([
            'name' => "Siyosiy kitoblar",
            'code' => "S.k",
            'status' => true,
        ]);

    }
}
