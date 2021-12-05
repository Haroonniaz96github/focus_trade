<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deposits')->insert([
            'amount' => '120',
            'slip' => 'file.png',
            'remarks' => 'hello',
            'pin' => '12345',
            'user_id' => '1',
        ]);
    }
}
