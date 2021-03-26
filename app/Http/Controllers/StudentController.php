<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{

    public function index()
    {
        // the wloquent to displays data
        $student = DB::table('student')->get(); // get() untuk mengambil semua data
        return view('student.index', compact('student'));
    }

    public function create()
    {
        // redirect to create view
        return view('student.create');
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

        // eloquent function to add data
        Student::create($request->all());

        // if the data is added successfully, will return to the main page
        return redirect()->route('student.index')
            ->with('success', 'Student Successfully Added');

    }

    public function show($Nim)
    {
        // displays detailed data by finding data by student nim
        $Student = Student::find($Nim);
        return view('student.detail', compact('Student'));
    }

    public function edit($Nim)
    {
        // displays detail data by finding based on Student Nim for editing
        $Student = DB::table('student')->where('nim', $Nim)->first();
        return view('student.edit', compact('Student'));

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

        // Eloquent function to update the data
        Student::find($Nim)->update($request->all());

        // id the data successfully update, will return to main page
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

