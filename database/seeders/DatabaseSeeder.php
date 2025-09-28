<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Branch;
use App\Models\BatchTime;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(){
        User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>Hash::make('password'),'role'=>'admin']);
        User::create(['name'=>'Faculty One','email'=>'faculty1@example.com','password'=>Hash::make('password'),'role'=>'faculty']);
        User::create(['name'=>'Faculty Two','email'=>'faculty2@example.com','password'=>Hash::make('password'),'role'=>'faculty']);

        Course::insert([['name'=>'PHP'],['name'=>'Laravel'],['name'=>'JS']]);
        Branch::insert([['name'=>'Vadodara'],['name'=>'Surat']]);
        BatchTime::insert([['time'=>'Morning'],['time'=>'Evening']]);
    }
}

