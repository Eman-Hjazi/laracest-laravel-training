<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * split seeder benefits:
     * 1- Run seeders in isolation
     * 2- Create dedicated seeders for constructing the world for a test.

     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory(200)->create();
    }
}
