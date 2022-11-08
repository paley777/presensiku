<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\PresensiController;

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

//logout
Route::post('/logout', [DashboardController::class, 'logout'])->middleware('auth');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/subjects', SubjectController::class)->middleware('auth');
Route::resource('/dashboard/kelas', KelasController::class)->middleware('auth');
Route::resource('/dashboard/students', StudentController::class)->middleware('auth');
Route::resource('/dashboard/datasets', DatasetController::class)->middleware('auth');
Route::resource('/dashboard/presences', PresensiController::class)->middleware('auth');

// Dataset From Siswa
Route::post('/dashboard/datasets/siswa', [DatasetController::class, 'indexsiswa'])->middleware('auth');

// Start Presensi
Route::post('/dashboard/presences/start', [PresensiController::class, 'start'])->middleware('auth');
Route::post('/dashboard/presences/save', [PresensiController::class, 'save'])->middleware('auth');
