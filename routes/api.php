<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseProfessorController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('cities', CityController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('coursesStudents', CourseStudentController::class);
Route::apiResource('coursesProfessors', CourseProfessorController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('professors', ProfessorController::class);