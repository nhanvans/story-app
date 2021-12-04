<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => '2021-11-26 17:07:53',
                'password' => Hash::make('khungha@123'),
                'roles' => '1',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ]
        ]);
    }
}
