<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [\App\Http\Controllers\Auth\SessionController::class, 'showLoginForm'])->name('login');
Route::get('/refresh-captcha', [\App\Http\Controllers\Auth\SessionController::class, 'refreshCaptcha']);
Route::post('/login-proses', [\App\Http\Controllers\Auth\SessionController::class, 'loginProses'])->name('login-proses');
Route::post('logout', [\App\Http\Controllers\Auth\SessionController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth', 'verified']], function () {

    Route::resource('dashboard', \App\Http\Controllers\Backsite\DashboardController::class);

    Route::resource('permission', \App\Http\Controllers\Backsite\PermissionController::class);

    Route::resource('role', \App\Http\Controllers\Backsite\RoleController::class);

    Route::resource('type_user', \App\Http\Controllers\Backsite\TypeUserController::class);

    Route::resource('user', \App\Http\Controllers\Backsite\UserController::class);

    Route::resource('prodi', \App\Http\Controllers\Backsite\ProdiController::class);

    Route::resource('dosen', \App\Http\Controllers\Backsite\DosenController::class);

    Route::resource('mahasiswa', \App\Http\Controllers\Backsite\MahasiswaController::class);

});
