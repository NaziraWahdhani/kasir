<?php

    use App\Http\Middleware\Authenticate;
    use App\Http\Middleware\Authorization;
    use App\Http\Controllers\BarangController;
    use App\Http\Controllers\KategoriBarangController;
    use App\Http\Controllers\LaporanPenjualanController;
    use App\Http\Controllers\LaporanStokController;
    use App\Http\Controllers\PelangganController;
    use App\Http\Controllers\PenjualanController;
    use App\Http\Controllers\SatuanController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\RolesController;
    use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'attempt'])->name('authenticate-laravel');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([Authenticate::class])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(Authorization::class)->group(function() {
        Route::get('master/pelanggan', [PelangganController::class, 'index'])->name('master.pelanggan');
        Route::get('master/pelanggan/create', [PelangganController::class, 'create'])->name('master.pelanggan.create');
        Route::post('tambah-pelanggan', [PelangganController::class, 'store'])->name('master.pelanggan.store');
        Route::get('pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('master.pelanggan.edit');
        Route::put('pelanggan/update/{id}', [PelangganController::class, 'update'])->name('master.pelanggan.update');
        Route::delete('pelanggan/delete/{id}', [PelangganController::class, 'delete'])->name('master.pelanggan.delete');

        Route::get('master/kategori-barang', [KategoriBarangController::class, 'index'])->name('master.kategori-barang');
        Route::get('master/kategori-barang/create', [KategoriBarangController::class, 'create'])->name('master.kategori-barang.create');
        Route::post('tambah-kategori-barang', [KategoriBarangController::class, 'store'])->name('master.kategori-barang.store');
        Route::get('kategori-barang/edit/{id}', [KategoriBarangController::class, 'edit'])->name('master.kategori-barang.edit');
        Route::put('kategori-barang/update/{id}', [KategoriBarangController::class, 'update'])->name('master.kategori-barang.update');
        Route::delete('kategori-barang/delete/{id}', [KategoriBarangController::class, 'delete'])->name('master.kategori-barang.delete');

        Route::get('master/barang', [BarangController::class, 'index'])->name('master.barang');
        Route::get('master/barang/create', [BarangController::class, 'create'])->name('master.barang.create');
        Route::post('tambah-barang', [BarangController::class, 'store'])->name('master.barang.store');
        Route::get('barang/edit/{id}', [BarangController::class, 'edit'])->name('master.barang.edit');
        Route::put('barang/update/{id}', [BarangController::class, 'update'])->name('master.barang.update');
        Route::delete('barang/delete/{id}', [BarangController::class, 'delete'])->name('master.barang.delete');
        Route::get('master/barang/harga', [BarangController::class, 'harga'])->name('master.barang.harga');

        Route::get('master/satuan', [SatuanController::class, 'index'])->name('master.satuan');
        Route::get('master/satuan/cretae', [SatuanController::class, 'create'])->name('master.satuan.create');
        Route::post('tambah-satuan', [SatuanController::class, 'store'])->name('master.satuan.store');

        Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan');
        Route::get('penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
        Route::post('tambah-penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');

        Route::get('laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan-penjualan');

        Route::get('laporan-stok', [LaporanStokController::class, 'index'])->name('laporan-stok');


        Route::get('pengaturan/data-user', [UserController::class, 'index'])->name('pengaturan.data-user');
        Route::get('pengaturan/data-user/create', [UserController::class, 'create'])->name('pengaturan.data-user.create');
        Route::post('tambah-user', [UserController::class, 'store'])->name('pengaturan.data-user.store');

        Route::get('pengaturan/user-roles', [RolesController::class, 'index'])->name('pengaturan.user-roles');
        Route::get('pengaturan/user-roles/create', [RolesController::class, 'create'])->name('pengaturan.user-roles.create');
        Route::get('pengaturan/user-roles/permission/{id}', [RolesController::class, 'permission'])->name('pengaturan.user-roles.permission');
        Route::put('pengaturan/user-roles/permission/save/{id}', [RolesController::class, 'save'])->name('pengaturan.user-roles.permission.save');
        Route::post('tambah-user-roles', [RolesController::class, 'store'])->name('pengaturan.user-roles.store');
    });
});
