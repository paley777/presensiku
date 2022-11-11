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
use App\Http\Controllers\ReportController;

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
Route::get('/login', [LandingController::class, 'login']);
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
Route::resource('/dashboard/reports', ReportController::class)->middleware('auth');

// Dataset From Siswa
Route::post('/dashboard/datasets/siswa', [DatasetController::class, 'indexsiswa'])->middleware('auth');

// Start Presensi
Route::post('/dashboard/presences/start', [PresensiController::class, 'start'])->middleware('auth');
Route::post('/dashboard/presences/save', [PresensiController::class, 'save'])->middleware('auth');

//print
Route::post('/dashboard/reports/print', [ReportController::class, 'print'])->middleware('auth');

// Face Recognition
Route::get('/facerecognition', [PresensiController::class, 'faceindex']);
Route::post('/recognize', [PresensiController::class, 'recognize']);
