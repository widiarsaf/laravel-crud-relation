@extends('student.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 80rem;">
            <div class="card-header">
                Student Detail
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nim: </b>{{$Student->nim}}</li>
                    <li class="list-group-item"><b>Name: </b>{{$Student->name}}</li>
                    <li class="list-group-item"><b>Class: </b>{{$Student->class->class_name}}</li>
                </ul>
            </div>
            <table>
                <tr>
                    <th>Course Name</th>
                    <th>Credit</th>
                    <th>Semester</th>
                    <th>Score</th>
                </tr>
                @foreach ($Student->course as $course)
                <tr>

                    <td>{{ $course ->course_name }}</td>
                    <td>{{ $course ->sks}}</td>
                    <td>{{ $course ->semester}}</td>
                    <td>{{ $course ->pivot->score }}</td>
                </tr>
                @endforeach


            </table>
            <a class="btn btn-success mt-3" href="{{ route('student.index') }}">Back</a>
        </div>
    </div>
</div>
@endsection
