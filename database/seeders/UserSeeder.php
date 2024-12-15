<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Admin Eunseok',
                'email' => 'Eunseok@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '08123456',
                'role' => 'admin',
            ),
            array(
                'name' => 'User Sungchan',
                'email' => 'Sungchan@gmail.com',
                'password' => bcrypt('12345678'),
                'phone_number' => '082345678',
                'role' => 'customer',
            ),
        ));
    }
}
