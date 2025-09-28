@extends('layouts.app')
@section('content')
<h3>Mark Attendance</h3>
<form method="POST" action="{{ route('attendance.store') }}">
    @csrf
    <input type="hidden" name="student_id" value="{{ $student->id }}">
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
@endsection
