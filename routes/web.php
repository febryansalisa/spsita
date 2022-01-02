<?php

use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanSidangController;
use App\Http\Controllers\SidangController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // MAHASISWA
    Route::get('/dashboard/bimbingan-mahasiswa', [BimbinganController::class, 'bimbinganMahasiswa'])->name('bimbingan.mahasiswa');
    Route::get('/dashboard/jadwal-sidang-mahasiswa', [SidangController::class, 'jadwalMahasiswa'])->name('jadwal-sidang.mahasiswa');
    // Route::get('/dashboard/pengajuan-sidang/create', [PengajuanSidangController::class, 'create'])->name('pengajuan-sidang.create');
    Route::post('/dashboard/pengajuan-sidang', [PengajuanSidangController::class, 'store'])->name('pengajuan-sidang.store');

    // DOSEN
    Route::get('/dashboard/jadwal-sidang-dosen', [SidangController::class, 'jadwalDosen'])->name('jadwal-sidang.dosen');
    Route::resource('/dashboard/bimbingan', BimbinganController::class);

    // PAA
    Route::get('/dashboard/pengajuan-sidang', [PengajuanSidangController::class, 'index'])->name('pengajuan-sidang.index');
    Route::put('/dashboard/pengajuan-sidang/{pengajuanSidang}', [PengajuanSidangController::class, 'update'])->name('pengajuan-sidang.update');
    Route::delete('/dashboard/pengajuan-sidang/{pengajuanSidang}', [PengajuanSidangController::class, 'destroy'])->name('pengajuan-sidang.destroy');
    Route::resource('/dashboard/sidang', SidangController::class);
});
