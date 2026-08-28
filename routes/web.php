<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Student Registration Routes
|--------------------------------------------------------------------------
|
| index  — GET  /                    → list all students
| create — GET  /students/create     → show registration form
| store  — POST /students            → validate & save new student
| show   — GET  /students/{student}  → view a student's profile
|
*/

Route::get('/',                    [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create',     [StudentController::class, 'create'])->name('students.create');
Route::post('/students',           [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}',  [StudentController::class, 'show'])->name('students.show');
