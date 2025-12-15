<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AdminAuthController::class, 'create'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AdminAuthController::class, 'store'])->name('login.post');
    Route::post('logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('admin_users', App\Http\Controllers\Admin\AdminUserController::class);
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
});
