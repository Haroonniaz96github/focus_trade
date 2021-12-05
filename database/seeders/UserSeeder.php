<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'sponser_id' => '12345678',
            'user_name' => 'user',
            'first_name' => 'John',
            'last_name' => 'Smith',
            'phone_number' => '+923456789345',
            'email' => 'user@domain.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
