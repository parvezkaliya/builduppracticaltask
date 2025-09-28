@extends('layouts.app')
@section('content')
<h3>Add Student</h3>
<form method="POST" action="{{ route('students.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-4 mb-3"><label>First Name</label><input type="text" name="firstname" class="form-control">@error('firstname')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Middle Name</label><input type="text" name="middlename" class="form-control">@error('middlename')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Surname</label><input type="text" name="surname" class="form-control">@error('surname')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Personal Number</label><input type="text" name="phone" class="form-control">@error('phone')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Parent Number</label><input type="text" name="parent_phone" class="form-control">@error('parent_phone')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Birth Date</label><input type="date" name="date_of_birth" class="form-control">@error('date_of_birth')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Enrollment Number</label><input type="text" name="enrollment_number" class="form-control">@error('enrollment_number')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-8 mb-3"><label>Address</label><textarea name="address" class="form-control"></textarea>@error('address')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Email</label><input type="email" name="email" class="form-control">@error('email')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Joining Date</label><input type="date" name="joining_date" class="form-control">@error('joining_date')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Admission Date</label><input type="date" name="admission_date" class="form-control">@error('admission_date')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>admission_fee</label><input type="number" name="admission_fee" class="form-control">@error('admission_fee')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Faculty</label>
            <select name="faculty_id" class="form-select">
                <option value="">Select Faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
            @error('faculty_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Course</label>
            <select name="course" class="form-select">
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->name }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Branch</label>
            <select name="branch" class="form-select">
                <option value="">Select Branch</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->name }}">{{ $branch->name }}</option>
                @endforeach
            </select>
            @error('branch')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Batch Time</label>
            <select name="batch_time" class="form-select">
                <option value="">Select Batch Time</option>
                @foreach($batchTimes as $batch)
                    <option value="{{ $batch->time }}">{{ $batch->time }}</option>
                @endforeach
            </select>
            @error('batch_time')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Status</label>
            <select name="status" class="form-select">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
    </div>
    <button class="btn btn-success">Submit</button>
</form>
@endsection
