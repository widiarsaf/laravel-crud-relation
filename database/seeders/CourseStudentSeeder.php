<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\CourseModel;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('course_student')->insert([
            [
                'student_id' => 1941720099, // you can change this data
                'course_id' => 1,
                'score' => 'A',
            ],
            [
                'student_id' => 1941720099,
                'course_id' => 2,
                'score' => 'A',
            ],
            [
                'student_id' => 1941720099,
                'course_id' => 3,
                'score' => 'B',
            ],
            [
                'student_id' => 1941720099,
                'course_id' => 4,
                'score' => 'C+',
            ],

        ]);
    }
}
