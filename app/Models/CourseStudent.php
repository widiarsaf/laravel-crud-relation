<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModel;
use App\Models\Student;

class CourseStudent extends Model
{
    use HasFactory;

    protected $table = 'course_student';
    protected $primartKey = 'id';

    public function student(){
       return  $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id')->withPivot('score');
   }

   public function course(){
       return $this->belongsToMany(CourseModel::class, 'course_student', 'course_student', 'course_id', 'student_id')->withPivot('score');
   }
}
