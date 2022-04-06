<?php

use App\Http\Controllers\DashboardMahasiswaController;
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
    return view('welcome');
});

// Route Mahasiswa
Route::get('/mahasiswa', [DashboardMahasiswaController::class, 'index']);
Route::get('/mahasiswa/profile', [DashboardMahasiswaController::class, 'profile']);
Route::get('/mahasiswa/form-apply-magang', [DashboardMahasiswaController::class, 'formApplyMagang'])->name('mahasiswa.formApplyMagang');
Route::post('/mahasiswa/form-apply-magang', [DashboardMahasiswaController::class, 'storeApplyMagang'])->name('mahasiswa.storeApplyMagang');
Route::get('/mahasiswa/form-magang', [DashboardMahasiswaController::class, 'formMagang'])->name('mahasiswa.formMagang');
Route::post('/mahasiswa/form-magang', [DashboardMahasiswaController::class, 'storeMagang'])->name('mahasiswa.storeMagang');
