<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\DataKerusakanController;
use App\Http\Controllers\JadwalKalibrasiController;
use App\Http\Controllers\JadwalPemeliharaanController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\RiwayatKalibrasiController;
use App\Http\Controllers\RiwayatPemeliharaanController;
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
    return view('beranda');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master', [App\Http\Controllers\MasterController::class, 'index'])->name('master');

// kategori
Route::get('/add-kategori', [App\Http\Controllers\MasterController::class, 'addKategori'])->name('add-kategori');
Route::post('/add-kategori', [App\Http\Controllers\MasterController::class, 'postKategori'])->name('post-kategori');
Route::get('/edit-kategori/{id}', [App\Http\Controllers\MasterController::class, 'editKategori'])->name('edit-kategori');
Route::post('/edit-kategori/{id}', [App\Http\Controllers\MasterController::class, 'putKategori'])->name('put-kategori');
Route::get('/delete-kategori/{id}', [App\Http\Controllers\MasterController::class, 'deleteKategori'])->name('delete-kategori');
// end kategori
// start lokasi
Route::get('/add-lokasi', [App\Http\Controllers\MasterController::class, 'addLokasi'])->name('add-lokasi');
Route::post('/add-lokasi', [App\Http\Controllers\MasterController::class, 'postLokasi'])->name('post-lokasi');
Route::get('/edit-lokasi/{id}', [App\Http\Controllers\MasterController::class, 'editLokasi'])->name('edit-lokasi');
Route::post('/edit-lokasi/{id}', [App\Http\Controllers\MasterController::class, 'putLokasi'])->name('put-lokasi');
Route::get('/delete-lokasi/{id}', [App\Http\Controllers\MasterController::class, 'deleteLokasi'])->name('delete-lokasi');
// end lokasi

// start PIC
Route::resource('pic', PicController::class);
Route::get('/pic-hapus/{id}',[App\Http\Controllers\PicController::class, 'delete'])->name('pic.hapus');
Route::resource('alat', AlatController::class);
Route::get('/alat-hapus/{id}',[App\Http\Controllers\AlatController::class, 'destroy'])->name('alat.hapus');
Route::resource('jadwal-kalibrasi', JadwalKalibrasiController::class);
Route::get('/jadwal-kalibrasi/delete/{id}',[App\Http\Controllers\JadwalKalibrasiController::class, 'destroy'])->name('jadwal-kalibrasi.hapus');
Route::resource('riwayat-kalibrasi', RiwayatKalibrasiController::class);
Route::get('/riwayat-kalibrasi/delete/{id}',[App\Http\Controllers\RiwayatKalibrasiController::class, 'destroy'])->name('riwayat-kalibrasi.hapus');

Route::resource('jadwal-pemeliharaan', JadwalPemeliharaanController::class);
Route::get('/jadwal-pemeliharaan/delete/{id}',[App\Http\Controllers\JadwalPemeliharaanController::class, 'destroy'])->name('jadwal-pemeliharaan.hapus');
Route::resource('riwayat-pemeliharaan', RiwayatPemeliharaanController::class);
Route::get('/riwayat-pemeliharaan/delete/{id}',[App\Http\Controllers\RiwayatPemeliharaanController::class, 'destroy'])->name('riwayat-pemeliharaan.hapus');
Route::resource('data-kerusakan', DataKerusakanController::class);
Route::get('/data-kerusakan/delete/{id}',[App\Http\Controllers\DataKerusakanController::class, 'destroy'])->name('data-kerusakan.hapus');