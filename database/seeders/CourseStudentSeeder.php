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
                'student_id' => Student::min('id_student'),
                'course_id' => CourseModel::min('id'),
                'score' => 'A',
            ],
            [
                'student_id' => Student::min('id_student'),
                'course_id' => CourseModel::min('id'),
                'score' => 'C',
            ],
            [
                'student_id' => Student::min('id_student'),
                'course_id' => CourseModel::min('id'),
                'score' => 'E',
            ],
            [
                'student_id' => Student::min('id_student'),
                'course_id' => CourseModel::min('id'),
                'score' => 'D',
            ],

        ]);
    }
}
