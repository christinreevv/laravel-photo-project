<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('photos')->insert([
            ['title'=> 'Котята', 'description'=> 'Crasy cats', 'created_at'=> Now(), 'updated_at'=> Now()]
        ]);
    }
}
