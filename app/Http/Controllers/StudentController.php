<?php

namespace App\Http\Controllers;

use App\Models\BatchTime;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $query = Student::query();

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                //search by all listed fields
                $q->where('surname', 'like', "%$search%")
                    ->orWhere('middlename', 'like', "%$search%")
                    ->orWhere('firstname', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('parent_phone', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%")
                    ->orWhere('enrollment_number', 'like', "%$search%");
            });
        }
        $students = $query->with('faculty')->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $faculties = User::where('role', 'faculty')->get();
        $courses = Course::all();
        $branches = Branch::all();
        $batchTimes = BatchTime::all();

        return view('students.create', compact('faculties', 'courses', 'branches', 'batchTimes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'surname' => 'required', 'middlename' => 'required', 'firstname' => 'required',
            'phone' => 'required|digits:10|unique:students',
            'parent_phone' => 'required|digits:10', 'date_of_birth' => 'required|date',
            'address' => 'required', 'email' => 'required|email|unique:students',
            'joining_date' => 'required|date', 'admission_date' => 'required|date', 'admission_fee' => 'required|numeric',
            'faculty_id' => 'required|exists:users,id', 'course' => 'required', 'branch' => 'required', 'batch_time' => 'required', 'status' => 'required|in:active,inactive','enrollment_number'=>'required|unique:students',
        ]);
        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added');
    }

    public function edit(Student $student)
    {
        $faculties = User::where('role', 'faculty')->get();
        $courses = Course::all();
        $branches = Branch::all();
        $batchTimes = BatchTime::all();

        return view('students.edit', compact('student', 'faculties', 'courses', 'branches', 'batchTimes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'surname' => 'required', 'middlename' => 'required', 'firstname' => 'required',
            'phone' => 'required|digits:10|unique:students,phone,'.$student->id,
            'parent_phone' => 'required|digits:10', 'date_of_birth' => 'required|date',
            'address' => 'required', 'email' => 'required|email|unique:students,email,'.$student->id,
            'joining_date' => 'required|date', 'admission_date' => 'required|date', 'admission_fee' => 'required|numeric',
            'faculty_id' => 'required|exists:users,id', 'course' => 'required', 'branch' => 'required', 'batch_time' => 'required', 'status' => 'required|in:active,inactive','enrollment_number'=>'required|unique:students,enrollment_number,'.$student->id,
        ]);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated');
    }
    //show
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted');
    }
}
