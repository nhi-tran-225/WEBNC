<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;


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


//back-end
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'showDashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'Dashboard']);

