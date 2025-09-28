<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Branch;
use App\Models\BatchTime;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Users
        User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>Hash::make('password'),'role'=>'admin']);
        $faculty1 = User::create(['name'=>'Faculty One','email'=>'faculty1@example.com','password'=>Hash::make('password'),'role'=>'faculty']);
        $faculty2 = User::create(['name'=>'Faculty Two','email'=>'faculty2@example.com','password'=>Hash::make('password'),'role'=>'faculty']);

        // Courses, Branches, BatchTimes
        Course::insert([['name'=>'PHP'],['name'=>'Laravel'],['name'=>'JS']]);
        Branch::insert([['name'=>'Vadodara'],['name'=>'Surat']]);
        BatchTime::insert([['time'=>'Morning'],['time'=>'Evening']]);

        // 20 Students
        for ($i=1; $i<=20; $i++) {
            $courseNames = ['PHP','Laravel','JS'];
            $branchNames = ['Vadodara','Surat'];
            $batchTimes = ['Morning','Evening'];

            $student = Student::create([
                'surname'=>"Surname$i",
                'firstname'=>"First$i",
                'middlename'=>"Middle$i",
                'email'=>"student$i@example.com",
                'phone'=>"99999999".str_pad($i,2,"0",STR_PAD_LEFT),
                'parent_phone'=>"88888888".str_pad($i,2,"0",STR_PAD_LEFT),
                'date_of_birth'=>now()->subYears(20)->format('Y-m-d'),
                'address'=>"Address $i",
                'joining_date'=>now()->subMonths(rand(1,12))->format('Y-m-d'),
                'admission_date'=>now()->subMonths(rand(1,12))->format('Y-m-d'),
                'admission_fee'=>rand(1000,5000),
                'faculty_id'=> ($i%2==0) ? $faculty1->id : $faculty2->id,
                'course'=> $courseNames[array_rand($courseNames)],
                'branch'=> $branchNames[array_rand($branchNames)],
                'batch_time'=> $batchTimes[array_rand($batchTimes)],
                'status'=>'active',
                'enrollment_number'=> 'ENR'.str_pad($i,4,'0',STR_PAD_LEFT),
            ]);

            // Optional: create User for student login
            User::create([
                'name'=> $student->surname.' '.$student->firstname,
                'email'=> $student->email,
                'password'=> Hash::make($student->phone),
                'role'=>'student'
            ]);
        }
    }
}
