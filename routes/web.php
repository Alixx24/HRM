<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
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
});


