@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Students</div>
                {{-- add search functionality --}}
                <div class="card-header">
                    <form action="{{ route('students.index') }}" method="GET" class="form-inline">
                        <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search by name or enrollment number" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                    </form>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Enrollment Number</th>
                                <th>StudentName</th>
                                <th>Mobile Number / Guardian Number / Email ID</th>
                                <th>Course & Joining Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->enrollment_number }}</td>
                                    <td>{{ $student->surname }} {{ $student->firstname }} {{ $student->middlename }}</td>
                                    <td>{{ $student->phone }} / {{ $student->parent_phone }} / {{ $student->email }}</td>
                                    <td>{{ $student->course }} & {{ $student->joining_date }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- pagination --}}
<div class="d-flex justify-content-center">
    {{ $students->links() }}
</div>

@endsection 