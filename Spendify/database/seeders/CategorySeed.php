<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		DB::table('categories')->insert(['name' => 'Sports']);
		DB::table('categories')->insert(['name' => 'Technology']);
		DB::table('categories')->insert(['name' => 'Furniture']);
		DB::table('categories')->insert(['name' => 'Clothes']);
		DB::table('categories')->insert(['name' => 'Tools']);
		DB::table('categories')->insert(['name' => 'Construction']);
        //
    }
}
