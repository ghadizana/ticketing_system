<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrupUserController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\MandaysController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TemporaryImageController;
use App\Http\Controllers\TiketController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'actionLogin')->name('actionLogin');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('auth', AuthController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('masterUser', MasterUserController::class);
    Route::resource('grup-user', GrupUserController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('permission', PermissionController::class);

    Route::resource('proyek', ProyekController::class);
    Route::resource('mandays', MandaysController::class);
    Route::resource('tiket', TiketController::class);
    Route::get('/create-tiket', [TiketController::class, 'user_create'])->name('userTiket.create');

    Route::resource('komentar', KomentarController::class);

    Route::controller(TemporaryImageController::class)->group(function() {
        Route::post('/upload', 'store')->name('image.store');
        Route::delete('/delete', 'destroy')->name('image.destroy');
    });
});
