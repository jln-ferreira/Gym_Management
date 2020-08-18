<?php

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

// -----[STUDENTS]-----
Route::resource('student', 'StudentController');

// -----[BELTS]-----
Route::resource('belt', 'BeltController');

// -----[GRADUATION]-----
Route::resource('graduation', 'GraduationController');
Route::get('student/{student_id}/graduation', 'GraduationController@StudentGraduation');

// -----[RESPONSABLE]-----
Route::resource('responsable', 'ResponsableController');
Route::get('student/{student_id}/responsable', 'ResponsableController@StudentResponsable');

// -----[FINANCE]-----
Route::resource('paymment', 'PaymmentController');
Route::get('student/{student_id}/paymment', 'PaymmentController@StudentPaymment');
