<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RoleCheck;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

// Rute lainnya
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/berita', [HomeController::class, 'semuaBerita'])->name('home.berita');
Route::get('/berita/{slug}', [HomeController::class, 'detailBerita'])->name('home.detailBerita');
Route::get('/kategori/{nama_kategori}', [HomeController::class, 'showBeritaByKategori'])->name('home.beritaByKategori');
Route::get('/about', [HomeController::class, 'aboutUs'])->name('home.aboutUs');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

// Rute untuk login
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Rute untuk register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.showRegisterForm');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// Grup rute dengan middleware web
Route::middleware('web')->group(function () {
    // Rute untuk admin
    Route::prefix('admin')->middleware(RoleCheck::class . ':admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.dashboard.profile');

        // Menampilkan halaman reset password
        Route::get('/reset-password', [DashboardController::class, 'resetPassword'])->name('admin.dashboard.resetPassword');
        // Mengupdate password
        Route::post('/reset-password', [DashboardController::class, 'updatePassword'])->name('admin.dashboard.updatePassword');

        // Route untuk kategori
        Route::prefix('kategori')->name('admin.kategori.')->group(function () {
            Route::get('/', [KategoriController::class, 'index'])->name('index');
            Route::get('/create', [KategoriController::class, 'create'])->name('create');
            Route::post('/store', [KategoriController::class, 'store'])->name('store');
            Route::get('/edit/{id_kategori}', [KategoriController::class, 'edit'])->name('edit');
            Route::post('/update', [KategoriController::class, 'update'])->name('update');
            Route::delete('/destroy/{id_kategori}', [KategoriController::class, 'destroy'])->name('destroy');
        });

        // Route untuk berita
        Route::prefix('berita')->name('admin.berita.')->group(function () {
            Route::get('/', [BeritaController::class, 'index'])->name('index');
            Route::get('/create', [BeritaController::class, 'create'])->name('create');
            Route::post('/store', [BeritaController::class, 'store'])->name('store');
            Route::get('/edit/{id_berita}', [BeritaController::class, 'edit'])->name('edit');
            Route::post('/update', [BeritaController::class, 'update'])->name('update');
            Route::delete('/destroy/{id_berita}', [BeritaController::class, 'destroy'])->name('destroy');
        });

        // Route untuk halaman user
        Route::prefix('user')->name('admin.user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id_user}', [UserController::class, 'edit'])->name('edit');
            Route::post('/update', [UserController::class, 'update'])->name('update');
            Route::delete('/destroy/{id_user}', [UserController::class, 'destroy'])->name('destroy');
        });

        // Route untuk menu
        Route::prefix('menu')->name('admin.menu.')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('index');
            Route::get('/create', [MenuController::class, 'create'])->name('create');
            Route::post('/store', [MenuController::class, 'store'])->name('store');
            Route::get('/edit/{id_menu}', [MenuController::class, 'edit'])->name('edit');
            Route::post('/update', [MenuController::class, 'update'])->name('update');
            Route::delete('/destroy/{id_menu}', [MenuController::class, 'destroy'])->name('destroy');
            Route::get('/order/{id_menu}/{id_swap}', [MenuController::class, 'order'])->name('order');
        });
    });

    // Rute untuk penulis
    Route::prefix('penulis')->middleware(RoleCheck::class . ':penulis')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('penulis.dashboard.index');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('penulis.dashboard.profile');

        // Menampilkan halaman reset password
        Route::get('/reset-password', [DashboardController::class, 'resetPassword'])->name('penulis.dashboard.resetPassword');
        // Mengupdate password
        Route::post('/reset-password', [DashboardController::class, 'updatePassword'])->name('penulis.dashboard.updatePassword');

        // Route untuk berita
        Route::prefix('berita')->name('penulis.berita.')->group(function () {
            Route::get('/', [BeritaController::class, 'index'])->name('index');
            Route::get('/create', [BeritaController::class, 'create'])->name('create');
            Route::post('/store', [BeritaController::class, 'store'])->name('store');
            Route::get('/edit/{id_berita}', [BeritaController::class, 'edit'])->name('edit');
            Route::post('/update', [BeritaController::class, 'update'])->name('update');
            Route::delete('/destroy/{id_berita}', [BeritaController::class, 'destroy'])->name('destroy');
        });
    });

    // Rute untuk user
    Route::prefix('user')->middleware(RoleCheck::class . ':user')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard.index');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('user.dashboard.profile');

        // Menampilkan halaman reset password
        Route::get('/reset-password', [DashboardController::class, 'resetPassword'])->name('user.dashboard.resetPassword');
        // Mengupdate password
        Route::post('/reset-password', [DashboardController::class, 'updatePassword'])->name('user.dashboard.updatePassword');
    });
});

// Route untuk menampilkan gambar berita
Route::get('files/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);
    return $response;
})->name('storage');
