<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jordy van Zeeland',
            'email' => 'jordyvanzeeland@gmail.com',
            'username' => 'jordyvanzeeland',
            'password' => bcrypt('FullStackDev91!')
        ]);
    }
}