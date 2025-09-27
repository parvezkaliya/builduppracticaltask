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
                'role' => 'admin',
                'password' => bcrypt('123456'),

            ],

            [

                'name' => 'Faculty User',
                'email' => 'Faculty@yopmail.com',
                'role' => 'faculty',
                'password' => bcrypt('123456'),

            ],

            [
                'name' => 'Student User',
                'email' => 'student@yopmail.com',
                'role' => 'student',
                'password' => bcrypt('123456'),
            ],

        ];

        foreach ($users as $key => $user) {

            User::create($user);

        }
    }
}
