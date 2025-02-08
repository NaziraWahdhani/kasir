<?php

    use App\Http\Controllers\BarangController;
    use App\Http\Controllers\KategoriBarangController;
    use App\Http\Controllers\LaporanPenjualanController;
    use App\Http\Controllers\LaporanStokController;
    use App\Http\Controllers\PelangganController;
    use App\Http\Controllers\PenjualanController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('master/management-user', [UserController::class, 'index'])->name('master.management-user');
Route::get('master/management-user/create', [UserController::class, 'create'])->name('master.management-user.create');

Route::get('master/pelanggan', [PelangganController::class, 'index'])->name('master.pelanggan');
Route::get('master/pelanggan/create', [PelangganController::class, 'create'])->name('master.pelanggan.create');

Route::get('master/kategori-barang', [KategoriBarangController::class, 'index'])->name('master.kategori-barang');
Route::get('master/kategori-barang/create', [KategoriBarangController::class, 'create'])->name('master.kategori-barang.create');
Route::post('tambah-kategori-barang', [KategoriBarangController::class, 'store'])->name('master.kategori-barang.store');
Route::get('kategori-barang/delete/{id}', [KategoriBarangController::class, 'delete'])->name('master.kategori-barang.delete');

Route::get('master/barang', [BarangController::class, 'index'])->name('master.barang');
Route::get('master/barang/create', [BarangController::class, 'create'])->name('master.barang.create');

Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');

Route::get('laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan-penjualan');

Route::get('laporan-stok', [LaporanStokController::class, 'index'])->name('laporan-stok');
