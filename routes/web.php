<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Student-only routes
Route::middleware(['auth', 'user-access:student'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Admin-only routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    // Admin-only student actions (create, edit, update, delete)
    Route::resource('students', StudentController::class)->except(['index', 'show']);
    //Regsiter user link
});

// Faculty-only dashboard route
Route::middleware(['auth', 'user-access:faculty'])->group(function () {
    Route::get('/faculty/home', [HomeController::class, 'facultyHome'])->name('faculty.home');
});

// Shared student routes (admin + faculty)
Route::middleware(['auth', 'user-access:admin,faculty'])->group(function () {
    Route::resource('students', StudentController::class)->only(['index', 'show']);
});
