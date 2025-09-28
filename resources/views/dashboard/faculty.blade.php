@extends('layouts.app')
@section('content')
<h2>Faculty Dashboard</h2>
<p>Welcome, {{ auth()->user()->name }} (Faculty)</p>
<a href="{{ route('attendance.index') }}" class="btn btn-primary mb-3">View Attendance</a>
@endsection
