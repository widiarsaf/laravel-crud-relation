<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection\paginate;
use DB;

class StudentController extends Controller
{

    public function index()
    {

        $search = request()->query('search');
        if($search){
        $student = Student::with('class')
                ->where('name','like',"%".$search."%")
                ->orderBy('id_student', 'asc')
                ->paginate();
        }
        else{
        $student = Student::with('class')
                ->orderBy('id_student', 'asc')
                ->paginate(3);
        }
        return view('student.index', ['student' => $student]);

    }

    public function create()
    {
        $class = ClassModel::all(); // get data from class table
        return view('student.create', ['class' => $class]);
    }

    public function store(Request $request)
    {
        // doing data validation
        $request->validate([
            'Nim'=>'required',
            'Name'=>'required',
            'Class'=>'required',
            'Major'=>'required',
            'Address'=>'required',
            'Date_Of_Birth'=>'required'
        ]);

        $student = new Student;
        $student->nim = $request->get('Nim');
        $student->name = $request->get('Name');
        $student->major = $request->get('Major');
        $student->address = $request->get('Address');
        $student->date_of_birth = $request->get('Date_Of_Birth');

        $class = new ClassModel;
        $class->id = $request->get('Class');

        // eloquent function to add data using belongsTo relation
        $student->class()->associate($class);
        $student->save();

        return redirect()->route('student.index')
            ->with('success', 'Student Successfully Added');

    }

    public function show($Nim)
    {
        // displays detailed data by finding / by student nim

        // Code before we create a relation --> $student = Student::find($Nim)
        $Student = Student::with('class')
            ->where('nim', $Nim)
            ->first();

        return view('student.detail', ['Student' => $Student]);
    }

    public function edit($Nim)
    {
        // displays detail data by finding based on Student Nim for editing
        $Student = Student::with('class')
            ->where('nim', $Nim)
            ->first();
        $Class = ClassModel::all(); // get data from class table
        return view('student.edit', ['Student' => $Student, 'Class' => $Class]);

    }

    public function update(Request $request, $Nim)
    {
        // validate the data
        $request->validate([
            'Nim' => 'required',
            'Name' => 'required',
            'Class' => 'required',
            'Major' => 'required',
            'Address'=>'required',
            'Date_Of_Birth'=>'required'
        ]);

        $student = Student::with('class')
            ->where('nim', $Nim)
            ->first();
        $student->nim = $request->get('Nim');
        $student->name = $request->get('Name');
        $student->major = $request->get('Major');
        $student->address = $request->get('Address');
        $student->date_of_birth = $request->get('Date_Of_Birth');
        $student->save();

        $class = new ClassModel;
        $class->id = $request->get('Class');

        // eloquent function to add data using belongsTo relation
        $student->class()->associate($class);
        $student->save();

        return redirect()->route('student.index')
            ->with('success', 'Student Successfully Updated');
    }

    public function destroy($Nim)
    {
        // Eloquent function to delete the data
        Student::find($Nim)->delete();
        return redirect()->route('student.index')
            ->with('success', 'Student Succesfully Deleted');
    }
}

