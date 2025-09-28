<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>Hash::make('password'),'role'=>'admin']);
        User::create(['name'=>'Faculty One','email'=>'faculty1@example.com','password'=>Hash::make('password'),'role'=>'faculty']);
    }
}
