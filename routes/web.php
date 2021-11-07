<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\DataKerusakanController;
use App\Http\Controllers\DataPerbaikanController;
use App\Http\Controllers\JadwalKalibrasiController;
use App\Http\Controllers\JadwalPemeliharaanController;
use App\Http\Controllers\KodePenyimpananController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PenggunaanBahanController;
use App\Http\Controllers\PermintaanBahanController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\RiwayatKalibrasiController;
use App\Http\Controllers\RiwayatPemeliharaanController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserManagementController;
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



Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::group(['middleware'=>['auth']], function(){

// user
Route::resource('user-management', UserManagementController::class);
Route::get('/user-management/hapus/{id}', [App\Http\Controllers\UserManagementController::class, 'destroy'])->name('user-management.hapus');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('root');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master', [App\Http\Controllers\MasterController::class, 'index'])->name('master');
Route::get('/master-kategori', [App\Http\Controllers\MasterController::class, 'indexKategori'])->name('master-kategori');
Route::get('/master-lokasi', [App\Http\Controllers\MasterController::class, 'indexLokasi'])->name('master-lokasi');
Route::get('/master-pic', [App\Http\Controllers\MasterController::class, 'indexPic'])->name('master-pic');
Route::resource('satuan', SatuanController::class);
Route::get('/satuan/hapus/{id}', [App\Http\Controllers\SatuanController::class, 'destroy'])->name('satuan-hapus');
Route::resource('kode-penyimpanan', KodePenyimpananController::class);
Route::get('/kode-penyimpanan/hapus/{id}', [App\Http\Controllers\KodePenyimpananController::class, 'destroy'])->name('kode-penyimpanan-hapus');

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
Route::get('/data-kerusakan/permintaan/{id}',[App\Http\Controllers\DataKerusakanController::class, 'permintaan'])->name('data-kerusakan.permintaan');
Route::post('/data-kerusakan/permintaan',[App\Http\Controllers\DataKerusakanController::class, 'permintaanCetak'])->name('data-kerusakan.permintaan.cetak');




Route::resource('data-perbaikan', DataPerbaikanController::class);
Route::get('/data-perbaikan/delete/{id}',[App\Http\Controllers\DataPerbaikanController::class, 'destroy'])->name('data-perbaikan.hapus');

// bahan
Route::resource('bahan', BahanController::class);
Route::get('/bahan/hapus/{id}', [App\Http\Controllers\BahanController::class, 'destroy'])->name('bahan.hapus');
// 
Route::resource('penerimaan-bahan', PenerimaanController::class);
Route::get('/penerimaan-bahan/hapus/{id}', [App\Http\Controllers\PenerimaanController::class, 'destroy'])->name('penerimaan-bahan.hapus');

Route::resource('penggunaan-bahan', PenggunaanBahanController::class);
Route::get('/penggunaan-bahan/hapus/{id}', [App\Http\Controllers\PenggunaanBahanController::class, 'destroy'])->name('penggunaan-bahan.hapus');
// permintaan bahan
Route::resource('permintaan-bahan', PermintaanBahanController::class);
Route::get('/permintaan-bahan/hapus/{id}', [App\Http\Controllers\PermintaanBahanController::class, 'destroy'])->name('permintaan-bahan.hapus');
Route::get('/permintaan-bahan-reset', [App\Http\Controllers\PermintaanBahanController::class, 'truncate'])->name('permintaan-bahan.reset');
Route::get('/permintaan-bahan-cetak', [App\Http\Controllers\PermintaanBahanController::class, 'cetak'])->name('permintaan-bahan.cetak');


});