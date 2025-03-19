<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $now = now();
       DB::table('products')->insert([
           'name' => 'Product 1',
           'price' => 1000,
           'stock' => 10,
           'created_at' => $now,
           'updated_at' => $now,
       ]);
       DB::table('products')->insert([
           'name' => 'Product 2',
           'price' => 2000,
           'stock' => 20,
           'created_at' => $now,
           'updated_at' => $now,
       ]);
       DB::table('products')->insert([
           'name' => 'Product 3',
           'price' => 3000,
           'stock' => 30,
           'created_at' => $now,
           'updated_at' => $now,
       ]);
    }
}
