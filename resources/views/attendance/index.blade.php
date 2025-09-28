@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Attendance Records</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $att)
            <tr>
                <td>{{ $att->student->surname }} {{ $att->student->firstname }}</td>
                <td>{{ $att->date }}</td>
                <td>{{ $att->time }}</td>
                <td>
                    <span class="badge bg-success">{{ ucfirst($att->status) }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $attendances->links() }}
</div>
@endsection
