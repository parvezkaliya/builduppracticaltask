@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Student</div>
                <div class="card-body">

                    {{-- Show validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Start --}}
                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- 3 by 3 layout rows with old or current values --}}

                        {{-- Row 1 --}}
                        <div class="row">
                            <div class="col-md-4">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', $student->surname) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="middlename">Middle Name</label>
                                <input type="text" class="form-control" id="middlename" name="middlename" value="{{ old('middlename', $student->middlename) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $student->firstname) }}" required>
                            </div>
                        </div>

                        {{-- Row 2 --}}
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="parentphone">Parent Phone</label>
                                <input type="text" class="form-control" id="parentphone" name="parentphone" value="{{ old('parentphone', $student->parentphone) }}" required>
                            </div>
                        </div>

                        {{-- Row 3 --}}
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="dateofbirth">Date of Birth</label>
                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth', $student->dateofbirth) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $student->address) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="joiningdate">Joining Date</label>
                                <input type="date" class="form-control" id="joiningdate" name="joiningdate" value="{{ old('joiningdate', $student->joiningdate) }}" required>
                            </div>
                        </div>

                        {{-- Row 4 --}}
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="admissiondate">Admission Date</label>
                                <input type="date" class="form-control" id="admissiondate" name="admissiondate" value="{{ old('admissiondate', $student->admissiondate) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="admissionfee">Admission Fee</label>
                                <input type="number" class="form-control" id="admissionfee" name="admissionfee" value="{{ old('admissionfee', $student->admissionfee) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="faculty">Faculty</label>
                                <input type="text" class="form-control" id="faculty" name="faculty" value="{{ old('faculty', $student->faculty) }}" required>
                            </div>
                        </div>

                        {{-- Row 5 --}}
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="course">Course</label>
                                <input type="text" class="form-control" id="course" name="course" value="{{ old('course', $student->course) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="branch">Branch</label>
                                <input type="text" class="form-control" id="branch" name="branch" value="{{ old('branch', $student->branch) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="batchtime">Batch Time</label>
                                <input type="text" class="form-control" id="batchtime" name="batchtime" value="{{ old('batchtime', $student->batchtime) }}" required>
                            </div>
                        </div>

                        {{-- Row 6 --}}
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="active" {{ (old('status', $student->status) == 'active') ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ (old('status', $student->status) == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="enrollment_number">Enrollment Number</label>
                                <input type="text" class="form-control" id="enrollment_number" name="enrollment_number" value="{{ old('enrollment_number', $student->enrollment_number) }}" required>
                            </div>
                        </div>

                        {{-- Submit Buttons --}}
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Update Student</button>
                                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>

                    </form>
                    {{-- Form End --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
