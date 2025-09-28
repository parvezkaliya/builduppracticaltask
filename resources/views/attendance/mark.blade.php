@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Mark Attendance</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('attendance.store') }}">
        @csrf
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
