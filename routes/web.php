<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


// -----[STUDENTS]-----
Route::get('student', 'StudentController@index');

// -----[BELTS]-----
Route::get('belt', 'BeltController@indexAuth');

// -----[ITEM]-----
Route::get('item', 'ItemController@indexAuth');

// -----[FINANCE]-----
Route::get('paymment', 'PaymmentController@indexAuth');

// -----[COST]-----
Route::get('cost', 'CostController@indexAuth');


