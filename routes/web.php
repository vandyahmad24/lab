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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\LaporanController;
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
Route::get('/user-management/hapus/{id}', [UserManagementController::class, 'destroy'])->name('user-management.hapus');
Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/master', [MasterController::class, 'index'])->name('master');
Route::get('/master-kategori', [MasterController::class, 'indexKategori'])->name('master-kategori');
Route::get('/master-lokasi', [MasterController::class, 'indexLokasi'])->name('master-lokasi');
Route::get('/master-pic', [MasterController::class, 'indexPic'])->name('master-pic');
Route::resource('satuan', SatuanController::class);
Route::get('/satuan/hapus/{id}', [SatuanController::class, 'destroy'])->name('satuan-hapus');
Route::resource('kode-penyimpanan', KodePenyimpananController::class);
Route::get('/kode-penyimpanan/hapus/{id}', [KodePenyimpananController::class, 'destroy'])->name('kode-penyimpanan-hapus');

// kategori
Route::get('/add-kategori', [MasterController::class, 'addKategori'])->name('add-kategori');
Route::post('/add-kategori', [MasterController::class, 'postKategori'])->name('post-kategori');
Route::get('/edit-kategori/{id}', [MasterController::class, 'editKategori'])->name('edit-kategori');
Route::post('/edit-kategori/{id}', [MasterController::class, 'putKategori'])->name('put-kategori');
Route::get('/delete-kategori/{id}', [MasterController::class, 'deleteKategori'])->name('delete-kategori');
// end kategori
// start lokasi
Route::get('/add-lokasi', [MasterController::class, 'addLokasi'])->name('add-lokasi');
Route::post('/add-lokasi', [MasterController::class, 'postLokasi'])->name('post-lokasi');
Route::get('/edit-lokasi/{id}', [MasterController::class, 'editLokasi'])->name('edit-lokasi');
Route::post('/edit-lokasi/{id}', [MasterController::class, 'putLokasi'])->name('put-lokasi');
Route::get('/delete-lokasi/{id}', [MasterController::class, 'deleteLokasi'])->name('delete-lokasi');
// end lokasi

// start PIC
Route::resource('pic', PicController::class);
Route::get('/pic-hapus/{id}',[PicController::class, 'delete'])->name('pic.hapus');
Route::resource('alat', AlatController::class);
Route::get('/alat-hapus/{id}',[AlatController::class, 'destroy'])->name('alat.hapus');
Route::resource('jadwal-kalibrasi', JadwalKalibrasiController::class);
Route::get('/jadwal-kalibrasi/delete/{id}',[JadwalKalibrasiController::class, 'destroy'])->name('jadwal-kalibrasi.hapus');
Route::resource('riwayat-kalibrasi', RiwayatKalibrasiController::class);
Route::get('/riwayat-kalibrasi/delete/{id}',[RiwayatKalibrasiController::class, 'destroy'])->name('riwayat-kalibrasi.hapus');

Route::resource('jadwal-pemeliharaan', JadwalPemeliharaanController::class);
Route::get('/jadwal-pemeliharaan/delete/{id}',[JadwalPemeliharaanController::class, 'destroy'])->name('jadwal-pemeliharaan.hapus');
Route::resource('riwayat-pemeliharaan', RiwayatPemeliharaanController::class);
Route::get('/riwayat-pemeliharaan/delete/{id}',[RiwayatPemeliharaanController::class, 'destroy'])->name('riwayat-pemeliharaan.hapus');

Route::resource('data-kerusakan', DataKerusakanController::class);
Route::get('/data-kerusakan/delete/{id}',[DataKerusakanController::class, 'destroy'])->name('data-kerusakan.hapus');
Route::get('/data-kerusakan/permintaan/{id}',[DataKerusakanController::class, 'permintaan'])->name('data-kerusakan.permintaan');
Route::post('/data-kerusakan/permintaan',[DataKerusakanController::class, 'permintaanCetak'])->name('data-kerusakan.permintaan.cetak');
// permintaanCetakSemua
Route::get('/data-kerusakan-cetak-semua',[DataKerusakanController::class, 'permintaanCetakSemua'])->name('data-kerusakan.cetak-semua');



Route::resource('data-perbaikan', DataPerbaikanController::class);
Route::get('/data-perbaikan/delete/{id}',[DataPerbaikanController::class, 'destroy'])->name('data-perbaikan.hapus');

// bahan
Route::resource('bahan', BahanController::class);
Route::get('/bahan/hapus/{id}', [BahanController::class, 'destroy'])->name('bahan.hapus');
// 
Route::resource('penerimaan-bahan', PenerimaanController::class);
Route::get('/penerimaan-bahan/hapus/{id}', [PenerimaanController::class, 'destroy'])->name('penerimaan-bahan.hapus');

Route::resource('penggunaan-bahan', PenggunaanBahanController::class);
Route::get('/penggunaan-bahan/hapus/{id}', [PenggunaanBahanController::class, 'destroy'])->name('penggunaan-bahan.hapus');
// permintaan bahan
Route::resource('permintaan-bahan', PermintaanBahanController::class);
Route::get('/permintaan-bahan/hapus/{id}', [PermintaanBahanController::class, 'destroy'])->name('permintaan-bahan.hapus');
Route::get('/permintaan-bahan-reset', [PermintaanBahanController::class, 'truncate'])->name('permintaan-bahan.reset');
Route::get('/permintaan-bahan-cetak', [PermintaanBahanController::class, 'cetak'])->name('permintaan-bahan.cetak');

// laporan
Route::get('/laporan-equipment', [LaporanController::class, 'index'])->name('laporan-equipment');
Route::get('/laporan-equipment/cetak', [LaporanController::class, 'cetak'])->name('laporan-equipment-cetak');

});