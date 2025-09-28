<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    // Show mark attendance form
    public function mark()
    {
        $student = Student::where('email', Auth::user()->email)->first();

        if (! $student) {
            return redirect()->back()->with('error', 'Student profile not found.');
        }

        return view('attendance.mark', compact('student'));
    }

    // Store attendance in DB
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:present,absent',
        ]);

        $student = Student::where('email', Auth::user()->email)->first();

        if (! $student) {
            return redirect()->back()->with('error', 'Student profile not found.');
        }

        $today = now()->toDateString();

        if (Attendance::where('student_id', $student->id)->where('date', $today)->exists()) {
            return redirect()->back()->with('error', 'You already marked attendance today.');
        }

        Attendance::create([
            'student_id' => $student->id,
            'date' => $today,
            'time' => now()->toTimeString(),
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Attendance marked successfully!');
    }

    // Faculty view attendance
    public function index()
    {
        $attendances = Attendance::latest()->paginate(10);

        return view('attendance.index', compact('attendances'));
    }
}
