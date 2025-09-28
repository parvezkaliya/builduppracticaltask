<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', fn () => redirect()->route('login.show'));
Route::get('/login', [LoginController::class, 'showLogin'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [RegisterController::class, 'index'])->name('users.index');

    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::post('/attendance/mark', [AttendanceController::class, 'mark'])->name('attendance.mark');

});

Route::middleware(['auth', 'role:faculty'])->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
});

Route::middleware(['auth', 'role:admin'])->get('/admin', fn () => view('dashboard.admin'))->name('admin.dashboard');
Route::middleware(['auth', 'role:faculty'])->get('/faculty', fn () => view('dashboard.faculty'))->name('faculty.dashboard');
Route::middleware(['auth', 'role:student'])->get('/student', fn () => view('dashboard.student'))->name('student.dashboard');
