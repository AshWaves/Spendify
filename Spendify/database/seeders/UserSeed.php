<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		DB::table('users')->insert([
			'document_id' => '444444444',
			'name' => 'Pablo',
			'last_name' => 'Toro',
			'email' => 'toropablo34@gmail.com',
			'password' => bcrypt(123456789),
			'address' => 'Not Found',
		]);

		DB::table('users')->insert([
			'document_id' => '18481948',
			'name' => 'Jaime',
			'last_name' => 'Garzon',
			'email' => 'jaimegarzon@gmail.com',
			'password' => bcrypt(123456789),
			'address' => 'Los ricos se creen ingleses, la clase media se cree gringa y los pobres se creen mexicanos. En el país no hay colombianos',
		]);
    }
}
