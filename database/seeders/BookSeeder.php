<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Laravel for Beginners',
                'writer' => 'John Doe',
                'user_id' => 1,
                'category_id' => 2,
                'publisher' => 'Tech Press',
                'year' => 2023,
            ],
            [
                'title' => 'Mastering PHP',
                'writer' => 'Jane Smith',
                'user_id' => 2,
                'category_id' => 3,
                'publisher' => 'Code World',
                'year' => 2022,
                
            ],
        ]);
    }
}
