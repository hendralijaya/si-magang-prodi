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
use App\Http\Controllers\DownloadController;

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

//Login routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route Mahasiswa
Route::get('/homemahasiswa', [DashboardMahasiswaController::class, 'index'])->name('mahasiswa.dashboard')->middleware('mahasiswa');
Route::get('/mahasiswa/profile', [DashboardMahasiswaController::class, 'profile'])->name('mahasiswa.profile')->middleware('mahasiswa');
Route::put('/mahasiswa/profile', [DashboardMahasiswaController::class, 'updateProfile'])->name('mahasiswa.editprofile')->middleware('mahasiswa');
Route::get('/mahasiswa/form-apply-magang', [DashboardMahasiswaController::class, 'formApplyMagang'])->name('mahasiswa.formApplyMagang')->middleware('mahasiswa');
Route::post('/mahasiswa/form-apply-magang', [DashboardMahasiswaController::class, 'storeApplyMagang'])->name('mahasiswa.storeApplyMagang')->middleware('mahasiswa');
Route::get('/mahasiswa/form-magang', [DashboardMahasiswaController::class, 'formMagang'])->name('mahasiswa.formMagang')->middleware('mahasiswa');
Route::post('/mahasiswa/form-magang', [DashboardMahasiswaController::class, 'storeMagang'])->name('mahasiswa.storeMagang')->middleware('mahasiswa');
Route::get('/mahasiswa/list-magang', [DashboardMahasiswaController::class, 'listMagang'])->name('mahasiswa.listMagang')->middleware('mahasiswa');
Route::get('/mahasiswa/list-apply-magang', [DashboardMahasiswaController::class, 'listApplyMagang'])->name('mahasiswa.listApplyMagang')->middleware('mahasiswa');

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


//download file
Route::get('/download/khs/{image}',[DownloadController::class, 'downloadKhs'])->name('download.khs')->middleware('admin');
Route::get('/download/asuransikesehatan/{image}',[DownloadController::class, 'downloadAsuransiKesehatan'])->name('download.asuransikesehatan')->middleware('admin');
Route::get('/download/coverletter/{image}',[DownloadController::class, 'downloadCoverLetter'])->name('download.coverletter')->middleware('admin');
Route::get('/download/cv/{image}',[DownloadController::class, 'downloadCV'])->name('download.cv')->middleware('admin');
Route::get('/download/formulirpendaftarankerjapraktik/{image}',[DownloadController::class, 'downloadFormulirPendaftaranKerjaPraktik'])->name('download.formulirpendaftarankerjapraktik')->middleware('admin');
Route::get('/download/fotomahasiswa/{image}',[DownloadController::class, 'downloadFotoMahasiswa'])->name('download.fotomahasiswa')->middleware('admin');
Route::get('/download/suratpengantarkerjapraktik/{image}',[DownloadController::class, 'downloadSuratPengantarKerjaPraktik'])->name('download.suratpengantarkerjapraktik')->middleware('admin');
Route::get('/download/bukuaktivitashariankerjapraktik/{image}',[DownloadController::class, 'downloadBukuAktivitasHarianKerjaPraktik'])->name('download.bukuaktivitashariankerjapraktik')->middleware('admin');
Route::get('/download/formulirbimbingankerjapraktik/{image}',[DownloadController::class, 'downloadFormulirBimbinganKerjaPraktik'])->name('download.formulirbimbingankerjapraktik')->middleware('admin');
Route::get('/download/laporankerjapraktik/{image}',[DownloadController::class, 'downloadLaporanKerjaPraktik'])->name('download.laporankerjapraktik')->middleware('admin');
Route::get('/download/suratketeranganbebasakademik/{image}',[DownloadController::class, 'downloadSuratKeteranganBebasAkademik'])->name('download.suratketeranganbebasakademik')->middleware('admin');
Route::get('/download/moa/{image}',[DownloadController::class, 'downloadMOA'])->name('download.moa')->middleware('admin');
Route::get('/download/mou/{image}',[DownloadController::class, 'downloadMOU'])->name('download.mou')->middleware('admin');