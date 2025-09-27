<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [

            [
                'name' => 'Admin User',
                'email' => 'admin@yopmail.com',
                'role' => 0,
                'password' => bcrypt('123456'),

            ],

            [

                'name' => 'Faculty User',
                'email' => 'Faculty@yopmail.com',
                'role' => 1,
                'password' => bcrypt('123456'),

            ],

            [
                'name' => 'Student User',
                'email' => 'student@yopmail.com',
                'role' => 2,
                'password' => bcrypt('123456'),
            ],

        ];

        foreach ($users as $key => $user) {

            User::create($user);

        }
    }
}
