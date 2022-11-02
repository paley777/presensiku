<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;

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

//Landing
Route::get('/', [LandingController::class, 'index']);
Route::post('/login', [LandingController::class, 'authenticate'])->name('login');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
