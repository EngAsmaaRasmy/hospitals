<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labs')->delete();
        DB::table('labs')->insert([
            'name' => 'lab',
            'email' => 'lab@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
