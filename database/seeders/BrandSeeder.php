<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Mango'],
            ['name' => 'Zara'],
            ['name' => 'H&M'],
            ['name' => 'Pull & Bear'],
            ['name' => 'Stradivarius'],
        ];

        DB::table('brands')->insert($brands);
    }
}
