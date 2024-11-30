<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['title' => 'Древесина',
            'description' => 'хорошая',
            'price' => '250',
            'quantity' => 100,],

            ['title' => 'Лак',
            'description' => 'хороший',
            'price' => '400',
            'quantity' => 100,],

            ['title' => 'Кирпич',
            'description' => 'замечательный',
            'price' => '300',
            'quantity' => 100,]
        ]);
    }
}
