@extends('layouts.app')
@section('content')
{{-- show layout 3 column --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Details</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $student->firstname }} {{ $student->middlename }} {{ $student->surname }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                    <p class="card-text"><strong>Phone:</strong> {{ $student->phone }}</p>
                    <p class="card-text"><strong>Address:</strong> {{ $student->address }}</p>
                    <p class="card-text"><strong>Date of Birth:</strong> {{ $student->
date_of_birth }}</p>
                    <p class="card-text"><strong>Enrollment Date:</strong> {{ $student->
enrollment_date }}</p>
                    <p class="card-text"><strong>Course:</strong> {{ $student->course   }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $student->status }}</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $student->created_at }}</p>
                    <p class="card-text"><strong>Updated At:</strong>   {{ $student->updated_at }}</p>
                    {{-- Back to list button --}}   
                    <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- Optional sidebar or additional content can go here --}}
        </div>
    </div>
</div>  
{{-- end create layout --}}
@endsection
