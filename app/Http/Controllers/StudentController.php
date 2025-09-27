<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display listing of students with optional search
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('surname', 'like', "%$search%")
                  ->orWhere('firstname', 'like', "%$search%")
                  ->orWhere('middlename', 'like', "%$search%")
                  ->orWhere('enrollment_number', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('parentphone', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $students = $query->paginate(10);
        return view('students.index', compact('students'));
    }

    // Show form to create a new student
    public function create()
    {
        return view('students.create');
    }

    // Store new student with validation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'surname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|numeric|digits:10',
            'parentphone' => 'required|numeric|digits:10',
            'dateofbirth' => 'required|date',
            'address' => 'required',
            'joiningdate' => 'required|date',
            'admissiondate' => 'required|date',
            'admissionfee' => 'required|numeric',
            'faculty' => 'required',
            'course' => 'required',
            'branch' => 'required',
            'batchtime' => 'required',
            'status' => 'required|in:active,inactive',
            'enrollment_number' => 'required|unique:students,enrollment_number',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    // Show specific student details
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show form for editing a student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student with validation
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'surname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|numeric|digits:10',
            'parentphone' => 'required|numeric|digits:10',
            'dateofbirth' => 'required|date',
            'address' => 'required',
            'joiningdate' => 'required|date',
            'admissiondate' => 'required|date',
            'admissionfee' => 'required|numeric',
            'faculty' => 'required',
            'course' => 'required',
            'branch' => 'required',
            'batchtime' => 'required',
            'status' => 'required|in:active,inactive',
            'enrollment_number' => 'required|unique:students,enrollment_number,' . $student->id,
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
