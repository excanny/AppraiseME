<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\EmployeeController;

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
    return view('front.login');
});

// Route::get('/master', function () {
//     return view('layouts.master');
// });

Route::get('/master', function () {
    return view('business.dashboard.index');
});

Route::get('register', [FrontEndController::class, 'register']);
Route::get('login', [FrontEndController::class, 'login']);
Route::post('loginaction', [FrontEndController::class, 'loginaction']);
Route::get('employee/login', [FrontEndController::class, 'employeelogin']);
Route::post('employeeloginaction', [FrontEndController::class, 'employeeloginaction']);
Route::post('registeraction', [FrontEndController::class, 'registeraction']);
Route::get('logout', [BusinessController::class, 'logout']);
Route::get('employeelogout', [EmployeeController::class, 'logout']);
Route::get('import', [FrontEndController::class, 'import']);
Route::post('importaction', [FrontEndController::class, 'importaction']);
Route::get('business-dashboard', [BusinessController::class, 'dashboard']);
Route::get('employee-dashboard', [EmployeeController::class, 'dashboard']);
Route::get('employees', [BusinessController::class, 'employees']);
Route::get('employee/{id}', [BusinessController::class, 'employee']);
Route::post('addemployee', [BusinessController::class, 'addemployee']);
Route::get('departments', [BusinessController::class, 'departments']);
Route::post('adddepartment', [BusinessController::class, 'adddepartment']);
Route::get('kpis', [BusinessController::class, 'kpis']);
Route::post('addkpi', [BusinessController::class, 'addkpi']);
Route::post('appraiseemployee', [BusinessController::class, 'appraiseemployee']);
Route::post('deleteemployeeappraisal/{id}', [BusinessController::class, 'deleteemployeeappraisal']);
Route::get('employee-appraisal', [EmployeeController::class, 'employeeappraisal']);
Route::post('selfappraisalaction', [EmployeeController::class, 'selfappraisalaction']);
Route::get('getkpiname/{id}', [BusinessController::class, 'getkpiname']);
Route::get('export', [BusinessController::class, 'export']);




