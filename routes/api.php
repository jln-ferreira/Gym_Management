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
Route::get('student/{student_id}/graduation', 'StudentController@GraduationProfile');
Route::get('student/{student_id}/responsable', 'StudentController@StudentProfile');
Route::get('student/{student_id}/paymment', 'StudentController@PaymmentProfile');

// -----[BELTS]-----
Route::resource('belt', 'BeltController');

// -----[GRADUATION]-----
Route::resource('graduation', 'GraduationController');

// -----[RESPONSABLE]-----
Route::resource('responsable', 'ResponsableController');

// -----[FINANCE]-----
Route::resource('paymment', 'PaymmentController');

// -----[ITEM]-----
Route::resource('item', 'ItemController');
