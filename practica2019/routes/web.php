<?php

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

Route::get('/about', 'AboutController@index');

Route::get('/employees','EmployeesController@show');
Route::post('/employees','EmployeesController@create');
Route::post('/employees/{employee}/delete','EmployeesController@delete');
Route::get('/employees/{employee}/edit','EmployeesController@edit');
Route::post('/employees/{employee}/update','EmployeesController@update');