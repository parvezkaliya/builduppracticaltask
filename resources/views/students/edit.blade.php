@extends('layouts.app')
@section('content')
<h3>Edit Student</h3>
<form method="POST" action="{{ route('students.update',$student->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-4 mb-3"><label>First Name</label><input type="text" name="firstname" class="form-control" value="{{ old('firstname',$student->firstname) }}">@error('firstname')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Middle Name</label><input type="text" name="middlename" class="form-control" value="{{ old('middlename',$student->middlename) }}">@error('middlename')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Surname</label><input type="text" name="surname" class="form-control" value="{{ old('surname',$student->surname) }}">@error('surname')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Personal Number</label><input type="text" name="phone" class="form-control" value="{{ old('phone',$student->phone) }}">@error('phone')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Parent Number</label><input type="text" name="parent_phone" class="form-control" value="{{ old('parent_phone',$student->parent_phone) }}">@error('parent_phone')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Birth Date</label><input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth',$student->date_of_birth) }}">@error('date_of_birth')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Enrollment Number</label><input type="text" name="enrollment_number" class="form-control" value="{{ old('enrollment_number',$student->enrollment_number) }}">@error('enrollment_number')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-8 mb-3"><label>Address</label><textarea name="address" class="form-control">{{ old('address',$student->address) }}</textarea>@error('address')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email',$student->email) }}">@error('email')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Joining Date</label><input type="date" name="joining_date" class="form-control" value="{{ old('joining_date',$student->joining_date) }}">@error('joining_date')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Admission Date</label><input type="date" name="admission_date" class="form-control" value="{{ old('admission_date',$student->admission_date) }}">@error('admission_date')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Fees</label><input type="number" name="admission_fee" class="form-control" value="{{ old('admission_fee',$student->admission_fee) }}">@error('admission_fee')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="col-md-4 mb-3"><label>Faculty</label>
            <select name="faculty_id" class="form-select">
                <option value="">Select Faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}" @if($faculty->id==$student->faculty_id) selected @endif>{{ $faculty->name }}</option>
                @endforeach
            </select>
            @error('faculty_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Course</label>
            <select name="course" class="form-select">
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->name }}" @if($course->name==$student->course) selected @endif>{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Branch</label>
            <select name="branch" class="form-select">
                <option value="">Select Branch</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->name }}" @if($branch->name==$student->branch) selected @endif>{{ $branch->name }}</option>
                @endforeach
            </select>
            @error('branch')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Batch Time</label>
            <select name="batch_time" class="form-select">
                <option value="">Select Batch Time</option>
                @foreach($batchTimes as $batch)
                    <option value="{{ $batch->time }}" @if($batch->time==$student->batch_time) selected @endif>{{ $batch->time }}</option>
                @endforeach
            </select>
            @error('batch_time')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-4 mb-3"><label>Status</label>
            <select name="status" class="form-select">
                <option value="active" @if($student->status=='active') selected @endif>Active</option>
                <option value="inactive" @if($student->status=='inactive') selected @endif>Inactive</option>
            </select>
        </div>
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
