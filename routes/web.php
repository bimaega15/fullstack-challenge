<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ChatAppController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CompleteProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RealtimeChatController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\Select2Controller;
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

Route::resource('kategoriBarang', KategoriBarangController::class)->except(['show']);
Route::get('kategoriBarang/dataTables', [KategoriBarangController::class, 'dataTables']);

Route::resource('barang', BarangController::class)->except(['show']);
Route::get('barang/dataTables', [BarangController::class, 'dataTables']);

Route::resource('satuanBarang', SatuanBarangController::class)->except(['show']);
Route::get('satuanBarang/dataTables', [SatuanBarangController::class, 'dataTables']);
Route::get('satuanBarang/{id}/changeStatus', [SatuanBarangController::class, 'changeStatus']);
Route::put('satuanBarang/{id}/changeStatus', [SatuanBarangController::class, 'updateChangeStatus']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/page/404', [PageController::class, 'page404'])->name('page.page404');

Route::get('/realtimeChat', [RealtimeChatController::class, 'index']);
Route::get('/chatApp', [ChatAppController::class, 'index']);

Route::get('select2/kategoriBarang', [Select2Controller::class, 'kategoriBarang']);
Route::get('select2/barang', [Select2Controller::class, 'barang']);
