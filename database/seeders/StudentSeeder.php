<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Using the factory to create 10 students
        Student::factory(10)->create();
    }
}
