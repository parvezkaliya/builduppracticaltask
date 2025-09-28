<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // Student mark attendance
    public function mark()
    {
        $student = Student::where('email', Auth::user()->email)->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student profile not found.');
        }

        $today = now()->toDateString();

        // prevent multiple marks
        if (Attendance::where('student_id', $student->id)->where('date', $today)->exists()) {
            return redirect()->back()->with('error', 'You already marked attendance today.');
        }

        Attendance::create([
            'student_id' => $student->id,
            'date' => $today,
            'time' => now()->toTimeString(),
            'status' => 'present',
        ]);

        return redirect()->back()->with('success', 'Attendance marked successfully!');
    }

    // Faculty view
    public function index()
    {
        $attendances = Attendance::with('student')->latest()->paginate(10);
        return view('attendance.index', compact('attendances'));
    }
}
