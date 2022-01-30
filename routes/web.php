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
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/department-wise', 'DashboardController@departmentWise');
Route::get('/department-wise/getData', 'DashboardController@departmentWiseFilter');

Route::get('/salery-range', 'DashboardController@getemployeeCountViaSaleryRangeData');

Route::get('/youngest-employee', 'DashboardController@youngestEomplyee');
Route::get('/youngest-employee/getData', 'DashboardController@getYoungestEmployeeDepartmentWise');


Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee/store', 'EmployeeController@store');
Route::get('employee/getData', 'EmployeeController@getData');
Route::get('/employee/edit-form/{id}', 'EmployeeController@getEmployeeDetails');
Route::post('/employee/update', 'EmployeeController@update');
Route::get('/employee/delete/{id}', 'EmployeeController@delete');



