<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ApplyMagangController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardMahasiswaController;



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

Route::get('/test', function () {
    return response()->file(Storage::path('public/test.pdf'));
});

// Regis routes
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

//Login routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route Mahasiswa
Route::get('/homemahasiswa', [DashboardMahasiswaController::class, 'index'])->name('mahasiswa.dashboard')->middleware('mahasiswa');
Route::get('/mahasiswa/profile', [DashboardMahasiswaController::class, 'profile'])->name('mahasiswa.profile')->middleware('mahasiswa');
Route::get('/mahasiswa/form-apply-magang', [DashboardMahasiswaController::class, 'formApplyMagang'])->name('mahasiswa.formApplyMagang')->middleware('mahasiswa');
Route::post('/mahasiswa/form-apply-magang', [DashboardMahasiswaController::class, 'storeApplyMagang'])->name('mahasiswa.storeApplyMagang')->middleware('mahasiswa');
Route::get('/mahasiswa/form-magang', [DashboardMahasiswaController::class, 'formMagang'])->name('mahasiswa.formMagang')->middleware('mahasiswa');
Route::post('/mahasiswa/form-magang', [DashboardMahasiswaController::class, 'storeMagang'])->name('mahasiswa.storeMagang')->middleware('mahasiswa');

// Route Admin
Route::get('/homeadmin', [DashboardAdminController::class, 'index'])->name('admin.dashboard')->middleware('admin');
Route::resource('/admin/perusahaan', PerusahaanController::class)->middleware('admin');
Route::resource('/admin/dosen', DosenController::class)->middleware('admin');
Route::resource('/admin/mahasiswa', MahasiswaController::class)->middleware('admin');
Route::resource('/admin/mentor', MentorController::class)->middleware('admin');
Route::resource('/admin/applymagang', ApplyMagangController::class)->middleware('admin');
Route::resource('/admin/magang', MagangController::class)->middleware('admin');

// Route Dosen
Route::get('/admin/profile', [DashboardDosenController::class, 'profile'])->name('dosen.profile')->middleware('dosen');


//test