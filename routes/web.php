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
Route::redirect('/register', '/login');
Route::redirect('/', '/login');

Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => ['auth'],
    'namespace' => '\App\Http\Controllers'
], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // Employees
    Route::get('/employees', 'EmployeeController@index')->name('employees.index');
    // Employee Salaries
    Route::get('/salaries', 'EmployeeSalaryController@index')->name('salaries.index');
    Route::get('/salary/employee/{employee_id}', 'EmployeeSalaryController@getEmployeeSalaryData')->name('salary.employee');
    Route::get('/salary/summary/monthly', 'EmployeeSalaryController@getMonthlySummarySalary')->name('monthly.summary.salaries');

});
