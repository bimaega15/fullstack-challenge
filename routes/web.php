<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CompleteProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SatuanBarangController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/email/verify', [VerificationController::class, 'index'])->name('verification.verify');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', [AccountController::class, 'index']);
    Route::put('/account/{id}/update', [AccountController::class, 'update']);
    Route::put('/account/{id}/updatePassword', [AccountController::class, 'updatePassword']);

    Route::post('/logout', [LogoutController::class, 'index']);
});

Route::group(['middleware' => 'verifyToken'], function () {
    Route::get('/completeProfile', [CompleteProfileController::class, 'index'])->name('completeProfile');
    Route::put('/completeProfile/update', [CompleteProfileController::class, 'update']);
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::get('adminPanel', [AdminPanelController::class, 'index'])->name('adminPanel');
Route::resource('kategoriBarang', KategoriBarangController::class);
Route::resource('barang', BarangController::class);
Route::resource('satuanBarang', SatuanBarangController::class);
Route::get('/page/404', [PageController::class, 'page404'])->name('page.page404');
