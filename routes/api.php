<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('getTeacherById/{id}', [TeacherController::class, 'getTeacherById']);
Route::post('registerOrUpdateTeacher', [TeacherController::class, 'registerOrUpdateTeacher']);

Route::post('register', [AuthController::class, 'register']);
Route::post('handleLogin', [AuthController::class, 'handleLogin']);
Route::get('getTeachers', [AuthController::class, 'getTeachers']);

Route::post('/createOrUpdateClass', [ClassController::class, 'createOrUpdateClass']);
Route::get('/getClassesByYear/{year}', [ClassController::class, 'getClassesByYear']);
Route::get('/getClasses', [ClassController::class, 'getClasses']);



Route::post('/createOrUpdateSubject', [SubjectController::class, 'createOrUpdateSubject']);

Route::get('/getStudents', [StudentController::class, 'getStudents']);
Route::post('/createOrUpdateStudent', [StudentController::class, 'createOrUpdateStudent']);
