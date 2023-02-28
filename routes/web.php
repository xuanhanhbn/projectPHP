<?php

use App\Http\Admin\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')-> group(function () {
    Route::get(
        '/login',
        [App\Http\Controllers\Admin\LoginController::class, "index"]
    )->name("admin_login");
    Route::post(
        '/login',
        [App\Http\Controllers\Admin\LoginController::class, "login"]
    )->name("admin_login.perform");
    Route::post(
        '/logout',
        [App\Http\Controllers\Admin\LoginController::class, "logout"]
    )->name("admin_logout");
    Route::get(
        '/register',
        [App\Http\Controllers\Admin\RegisterController::class, "index"]
    )->name("admin_register");
    Route::post(
        '/register',
        [App\Http\Controllers\Admin\RegisterController::class, "register"]
    )->name("admin_register.perform");
    Route::get(
        '/reset-password',
        [App\Http\Controllers\Admin\ResetPassword::class, "index"]
    )->name("admin_reset-password");
    Route::get(
        '/home',
        [App\Http\Controllers\Admin\HomeController::class, "index"]
    )->name("admin_home");
    Route::get(
        '/profile',
        [App\Http\Controllers\Admin\UserProfileController::class, "index"]
    )->name("admin_profile");
    Route::post(
        '/profile',
        [App\Http\Controllers\Admin\UserProfileController::class, "update"]
    )->name("admin_profile.update");
    Route::get(
        '/{page}',
        [App\Http\Controllers\Admin\PageController::class, "index"]
    )->name("admin_page");
    
});