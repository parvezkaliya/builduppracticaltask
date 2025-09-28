<?php

namespace Database\Seeders;

use App\Models\BatchTime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BatchTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BatchTime::insert([['time'=>'Morning'],['time'=>'Evening']]);

    }
}
