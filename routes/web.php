<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/user', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Index');
    })->name('index');

    Route::controller(StudentController::class)->group(function () {
        Route::get('student/', 'indexView')->name('student.index');
        Route::get('/student/create', 'createView')->name('student.create');
        Route::get('/student/edit/{student}', 'editView')->name('student.edit');
        Route::get('/student/{student}', 'showView')->name('student.show');
    });

    Route::controller(ProfessorController::class)->group(function () {
        Route::get('professor/', 'indexView')->name('professor.index');
        Route::get('/professor/create', 'createView')->name('professor.create');
        Route::get('/professor/edit/{professor}', 'editView')->name('professor.edit');
        Route::get('/professor/{professor}', 'showView')->name('professor.show');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('course/', 'indexView')->name('course.index');
        Route::get('/course/create', 'createView')->name('course.create');
        Route::get('/course/edit/{course}', 'editView')->name('course.edit');
        Route::get('/course/{course}', 'showView')->name('course.show');
    });
});
