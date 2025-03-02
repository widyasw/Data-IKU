<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IKU1Controller;
use App\Http\Controllers\IKU2Controller;
use App\Http\Controllers\IKU3Controller;
use App\Http\Controllers\IKU4Controller;
use App\Http\Controllers\IKU5Controller;
use App\Http\Controllers\IKU6Controller;
use App\Http\Controllers\IKU7Controller;
use App\Http\Controllers\IKU8Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

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

// Language Change
Route::get('lang/{lang}', function ($lang) {
    if (array_key_exists($lang, Config::get('languages'))) {
        Session::put('applocale', $lang);
    }
    return redirect()->back();
})->name('lang');

Route::middleware('language')->group(function () {

    // Frontend routes
    Route::get('/', function () {
        return redirect('login');
    });

    // Show file
    Route::get('/show-file/{path}/{id}', [DashboardController::class, 'show_file'])->name('show_file');

    // Dashboard
    Route::middleware('auth', 'verified')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });


    // Admin routes
    Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'admin')->name('dashboard');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

        Route::prefix('iku-1')->name('iku-1.')->group(function () {
            Route::get('/', [IKU1Controller::class, 'index'])->name('index')->can('iku 1 lihat');
            Route::get('/cetak', [IKU1Controller::class, 'print'])->name('print')->can('iku 1 cetak');
            Route::post('/', [IKU1Controller::class, 'store'])->name('store')->can('iku 1 tambah');
            Route::put('/{iku1}', [IKU1Controller::class, 'update'])->name('update')->can('iku 1 edit');
            Route::delete('/{iku1}', [IKU1Controller::class, 'destroy'])->name('destroy')->can('iku 1 hapus');
        });
        Route::prefix('iku-2')->name('iku-2.')->group(function () {
            Route::get('/', [IKU2Controller::class, 'index'])->name('index')->can('iku 2 lihat');
            Route::get('/cetak', [IKU2Controller::class, 'print'])->name('print')->can('iku 2 cetak');
            Route::post('/', [IKU2Controller::class, 'store'])->name('store')->can('iku 2 tambah');
            Route::put('/{iku2}', [IKU2Controller::class, 'update'])->name('update')->can('iku 2 edit');
            Route::delete('/{iku2}', [IKU2Controller::class, 'destroy'])->name('destroy')->can('iku 2 hapus');
        });
        Route::prefix('iku-3')->name('iku-3.')->group(function () {
            Route::get('/', [IKU3Controller::class, 'index'])->name('index')->can('iku 3 lihat');
            Route::get('/cetak', [IKU3Controller::class, 'print'])->name('print')->can('iku 3 cetak');
            Route::post('/', [IKU3Controller::class, 'store'])->name('store')->can('iku 3 tambah');
            Route::put('/{iku3}', [IKU3Controller::class, 'update'])->name('update')->can('iku 3 edit');
            Route::delete('/{iku3}', [IKU3Controller::class, 'destroy'])->name('destroy')->can('iku 3 hapus');
        });
        Route::prefix('iku-4')->name('iku-4.')->group(function () {
            Route::get('/', [IKU4Controller::class, 'index'])->name('index')->can('iku 4 lihat');
            Route::get('/cetak', [IKU4Controller::class, 'print'])->name('print')->can('iku 4 cetak');
            Route::post('/', [IKU4Controller::class, 'store'])->name('store')->can('iku 4 tambah');
            Route::put('/{iku4}', [IKU4Controller::class, 'update'])->name('update')->can('iku 4 edit');
            Route::delete('/{iku4}', [IKU4Controller::class, 'destroy'])->name('destroy')->can('iku 4 hapus');
        });
        Route::prefix('iku-5')->name('iku-5.')->group(function () {
            Route::get('/', [IKU5Controller::class, 'index'])->name('index')->can('iku 5 lihat');
            Route::get('/cetak', [IKU5Controller::class, 'print'])->name('print')->can('iku 5 cetak');
            Route::post('/', [IKU5Controller::class, 'store'])->name('store')->can('iku 5 tambah');
            Route::put('/{iku5}', [IKU5Controller::class, 'update'])->name('update')->can('iku 5 edit');
            Route::delete('/{iku5}', [IKU5Controller::class, 'destroy'])->name('destroy')->can('iku 5 hapus');
        });
        Route::prefix('iku-6')->name('iku-6.')->group(function () {
            Route::get('/', [IKU6Controller::class, 'index'])->name('index')->can('iku 6 lihat');
            Route::get('/cetak', [IKU6Controller::class, 'print'])->name('print')->can('iku 6 cetak');
            Route::post('/', [IKU6Controller::class, 'store'])->name('store')->can('iku 6 tambah');
            Route::put('/{iku6}', [IKU6Controller::class, 'update'])->name('update')->can('iku 6 edit');
            Route::delete('/{iku6}', [IKU6Controller::class, 'destroy'])->name('destroy')->can('iku 6 hapus');
        });
        Route::prefix('iku-7')->name('iku-7.')->group(function () {
            Route::get('/', [IKU7Controller::class, 'index'])->name('index')->can('iku 7 lihat');
            Route::get('/cetak', [IKU7Controller::class, 'print'])->name('print')->can('iku 7 cetak');
            Route::post('/', [IKU7Controller::class, 'store'])->name('store')->can('iku 7 tambah');
            Route::put('/{iku7}', [IKU7Controller::class, 'update'])->name('update')->can('iku 7 edit');
            Route::delete('/{iku7}', [IKU7Controller::class, 'destroy'])->name('destroy')->can('iku 7 hapus');
        });
        Route::prefix('iku-8')->name('iku-8.')->group(function () {
            Route::get('/', [IKU8Controller::class, 'index'])->name('index')->can('iku 8 lihat');
            Route::get('/cetak', [IKU8Controller::class, 'print'])->name('print')->can('iku 8 lihat');
            Route::post('/', [IKU8Controller::class, 'store'])->name('store')->can('iku 8 tambah');
            Route::put('/{iku8}', [IKU8Controller::class, 'update'])->name('update')->can('iku 8 edit');
            Route::delete('/{iku8}', [IKU8Controller::class, 'destroy'])->name('destroy')->can('iku 8 hapus');
        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index')->can('user lihat');
            Route::get('/create', [UserController::class, 'create'])->name('create')->can('user tambah');
            Route::post('/', [UserController::class, 'store'])->name('store')->can('user tambah');
            Route::get('/{user}', [UserController::class, 'show'])->name('show')->can('user lihat');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->can('user edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update')->can('user edit');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->can('user hapus');
        });

        Route::prefix('role')->name('role.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index')->can('hak akses lihat');
            Route::get('/create', [RoleController::class, 'create'])->name('create')->can('hak akses tambah');
            Route::post('/', [RoleController::class, 'store'])->name('store')->can('hak akses tambah');
            Route::get('/{role}', [RoleController::class, 'show'])->name('show')->can('hak akses lihat');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit')->can('hak akses edit');
            Route::put('/{role}', [RoleController::class, 'update'])->name('update')->can('hak akses edit');
            Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy')->can('hak akses hapus');
        });

    });
});

require __DIR__ . '/auth.php';
