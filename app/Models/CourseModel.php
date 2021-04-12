<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Student;

class CourseModel extends Model
{
    use HasFactory;
    protected $table = 'course'; // define that this model is relate to course table
    protected $primaryKey = 'id';

    protected $fillable =[
       'course_name'
   ];

    public function student() {
        return $this->BelongsToMany(Student::class , 'course_student', 'course_id', 'student_id')->withPivot('score');
    }
}
