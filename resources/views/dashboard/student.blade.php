@extends('layouts.app')
@section('content')
<h2>Student Dashboard</h2>
<p>Welcome, {{ auth()->user()->name }} (Student)</p>
@if(Auth::user()->role == 'student')
    <form method="POST" action="{{ route('attendance.mark') }}">
        @csrf
        <button type="submit" class="btn btn-success">Mark Attendance</button>
    </form>
@endif
@endsection
