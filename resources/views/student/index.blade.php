@extends('student.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-3">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="mt-4 mb-2">
            <div class="row">
                <div class="col my-2">
                    <form class="form-inline" {{ route('student.index') }}>
                        <input class="form-control mr-sm-2" style="width: 400px" type="search" placeholder="Search"
                            aria-label="search" name="search" id="search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <div class="col my-2">
                    <div class="float-right">
                        <a class=" btn btn-success" href="{{ route('student.create') }}"> Input Student Data</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@if ($message = Session::get('success'))<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Name</th>
        <th>Class</th>
        <th>Major</th>
        <th>Address</th>
        <th>Date of Birth</th>
        <th width="280px">Action</th>
    </tr>
    @if (count($student) > 0)
    @foreach ($student as $mhs)
    <tr>
        <td>{{ $mhs ->nim }}</td>
        <td>{{ $mhs ->name }}</td>
        <td>{{ $mhs ->class->class_name}}</td>
        <td>{{ $mhs ->major }}</td>
        <td>{{ $mhs ->address }}</td>
        <td>{{ $mhs ->date_of_birth }}</td>
        <td>
            <form action="{{ route('student.destroy',['student'=>$mhs->nim]) }}" method="POST">
                <a class="btn btn-info" href="{{ route('student.show',$mhs->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('student.edit',$mhs->nim) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a class="btn btn-warning" href="{{ route('student.showCourse',$mhs->nim) }}">Nilai</a>
            </form>
        </td>
    </tr>
    @endforeach
    @else
    <td colspan="7"><b class="text-danger">student not found</b></td>
    @endif

</table>
<div class="d-flex mt-3">
    {{ $student->links('pagination::bootstrap-4') }}
</div>
@endsection
