@extends('layouts.app')
@section('content')
<h2>Admin Dashboard</h2>
<p>Welcome, {{ auth()->user()->name }} (Admin)</p>
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>
<a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Manage Students</a>
@endsection
