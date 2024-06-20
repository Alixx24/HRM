<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\JobsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']);
Route::get('/forget-password', [AuthController::class, 'forgetPassword']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);
Route::post('/login_post', [AuthController::class, 'login_post']);


Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/employees', [EmployeeController::class, 'index']);
    Route::get('admin/employees/add', [EmployeeController::class, 'add']);
    Route::post('admin/employees/add', [EmployeeController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeeController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeeController::class, 'update']);
    Route::post('admin/employees/delete/{id}', [EmployeeController::class, 'delete']);

    //Job Start
    Route::get('admin/jobs', [JobsController::class, 'index']);
    Route::get('admin/jobs/add', [JobsController::class, 'add']);
    Route::post('admin/jobs/add', [JobsController::class, 'addPost']);
    Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);

});

Route::get('logout', [AuthController::class, 'logout']);

