<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[
            ['name' => 'Sweaters'],
            ['name' => 'T-Shirt'],
            ['name' => 'Hoodies'],
            ['name' => 'Jacket'],
            ['name' => 'Pants'],
        ];

        DB::table('categories')->insert($categories);
    }
}
