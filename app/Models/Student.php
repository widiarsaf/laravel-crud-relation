<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authentication;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassModel;

class Student extends Model
{
   protected $table = 'student'; // Eloquent will create a student model to stire records in the student table
   protected $primaryKey= 'nim'; // calling DB contents with primary key

   protected $fillable =[
       'Nim',
       'Name',
       'Class_Id',
       'Major',
       'Address',
       'Date_Of_Birth'
   ];

   public function class(){
       return $this->belongsTo(ClassModel::class);
   }
}
