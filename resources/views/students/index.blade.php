@extends('layouts.app')
@section('content')
<h3>Student Listing</h3>
{{-- add create button --}}
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
{{-- display success message --}}
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
{{-- add search --}}
<form method="GET" action="{{ route('students.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Enrollment No</th>
            <th>Photo</th>
            <th>Student Name</th>
            <th>Course & Joining Date</th>
            <th>Mobile / Guardian / Email</th>
            <th>Faculty & Branch</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr @if(session('last_added')==$student->id) class="table-success" @endif>
            <td>{{ $student->id }}</td>
            <td><img src="https://via.placeholder.com/50" alt="photo"></td>
            <td>{{ $student->surname }} {{ $student->middlename }} {{ $student->firstname }}</td>
            <td>{{ $student->course }} / {{ $student->joining_date }}</td>
            <td>{{ $student->phone }} / {{ $student->parent_phone }} / {{ $student->email }}</td>
            <td>{{ $student->faculty->name ?? 'N/A' }} / {{ $student->branch }}</td>
            <td>{{ ucfirst($student->status) }}</td>
            <td>
                <a href="#" class="btn btn-info btn-sm">Profile</a>
                <a href="#" class="btn btn-success btn-sm">Message</a>
                <a href="#" class="btn btn-warning btn-sm">Attendance</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $students->links() }}
@endsection
