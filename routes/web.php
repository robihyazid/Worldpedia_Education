<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use App\Models\daftarmodel;
use App\Models\galerimodel;
use App\Models\gurumodel;
use App\Models\kelasmodel;
use App\Models\konfirmasimodel;
use App\Models\rolemodel;
use App\Models\User;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'registerindex'])->name('register.index');
Route::post('/register', [LoginController::class, 'register'])->name('register.simpan');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/about', function () {
    return view('pages.about', [
        'title' => 'About',
    ]);
});

Route::get('/teachers', [TeachersController::class, 'guru'])->name('teachers.index');

Route::get('/gallery', [GalleryController::class, 'galeri'])->name('gallery.index');

Route::get('/contact', function () {
    return view('pages.contact', [
        'title' => 'Contact',
    ]);
});


Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/daftar', [DaftarController::class, 'create'])->name('daftar.create');
    Route::post('/daftar/tambah', [DaftarController::class, 'store'])->name('daftar.store');
    Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi.index');
    Route::post('/konfirmasi/tambah', [KonfirmasiController::class, 'store'])->name('konfirmasi.store');
    Route::get('/afterkonfirmasi', function () {
        return view('pages.afterkonfirmasi', [
            'title' => 'AfterKonfirmasi',
        ]);
    });
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', function () {
        $jumlahdaftar = daftarmodel::count();
        $jumlahkelas = kelasmodel::count();
        $jumlahguru = gurumodel::count();
        $jumlahfoto = galerimodel::count();
        $jumlahuser = User::count();
        $jumlahkonfirmasi = konfirmasimodel::count();

        return view('layouts.admin.dashboard', compact('jumlahdaftar','jumlahkelas','jumlahguru','jumlahfoto','jumlahuser','jumlahkonfirmasi'));
    });

    // Export PDF
    Route::get('/exportpdfdaftar/{kode}', [DaftarController::class, 'exportpdf'])->name('export.pdf');

    Route::get('/admin/daftar', [DaftarController::class, 'index'])->name('daftar.index');
    Route::get('/admin/daftar/edit/{id}', [DaftarController::class, 'edit'])->name('daftar.edit');
    Route::put('/admin/daftar/edit/{id}', [DaftarController::class, 'update'])->name('daftar.update');
    Route::delete('/admin/daftar/hapus{id}', [DaftarController::class, 'destroy'])->name('daftar.destroy');
    Route::get('/admin/daftar/show/{id}', [DaftarController::class, 'show'])->name('daftar.show');

    Route::get('/admin/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/admin/kelas/tambah', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/admin/kelas/tambah', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/admin/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/admin/kelas/edit/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/admin/kelas/hapus{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    Route::get('/admin/guru', [TeachersController::class, 'index'])->name('guru.index');
    Route::get('/admin/guru/tambah', [TeachersController::class, 'create'])->name('guru.create');
    Route::post('/admin/guru/tambah', [TeachersController::class, 'store'])->name('guru.store');
    Route::get('/admin/guru/edit{id}', [TeachersController::class, 'edit'])->name('guru.edit');
    Route::put('/admin/guru/edit{id}', [TeachersController::class, 'update'])->name('guru.update');
    Route::delete('/admin/guru/hapus{id}', [TeachersController::class, 'destroy'])->name('guru.destroy');

    Route::get('/admin/galeri', [GalleryController::class, 'index'])->name('galeri.index');
    Route::get('/admin/galeri/tambah', [GalleryController::class, 'create'])->name('galeri.create');
    Route::post('/admin/galeri/tambah', [GalleryController::class, 'store'])->name('galeri.store');
    Route::get('/admin/galeri/edit{id}', [GalleryController::class, 'edit'])->name('galeri.edit');
    Route::put('/admin/galeri/edit{id}', [GalleryController::class, 'update'])->name('galeri.update');
    Route::delete('/admin/galeri/hapus{id}', [GalleryController::class, 'destroy'])->name('galeri.destroy');

    Route::get('admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('admin/user/tambah', [UserController::class, 'create'])->name('user.create');
    Route::post('admin/user/tambah', [UserController::class, 'store'])->name('user.store');
    Route::get('admin/user/edit{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('admin/user/edit{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('admin/user/hapus{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('admin/konfirmasi', [KonfirmasiController::class, 'detail'])->name('konfirmasi.detail');
    Route::get('admin/konfirmasi/edit{id}', [KonfirmasiController::class, 'edit'])->name('konfirmasi.edit');
    Route::put('admin/konfirmasi/edit{id}', [KonfirmasiController::class, 'update'])->name('konfirmasi.update');
    Route::delete('admin/konfirmasi/hapus{id}', [KonfirmasiController::class, 'destroy'])->name('konfirmasi.destroy');
});
