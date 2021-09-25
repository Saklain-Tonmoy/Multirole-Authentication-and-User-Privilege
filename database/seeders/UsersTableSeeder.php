<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'role_id' => '1',   // admin
            'name' => 'Golam Saklain',
            'email' => 'tonmoysaklain@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        
        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
