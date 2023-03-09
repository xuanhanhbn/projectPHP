<?php
Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, "index"])->name("login");
Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, "login"])->name("login.perform");
Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, "logout"])->name("logout");
Route::get('/register', [App\Http\Controllers\Admin\RegisterController::class, "index"])->name("register");
Route::post('/register', [App\Http\Controllers\Admin\RegisterController::class, "register"])->name("register.perform");
Route::get('/reset-password', [App\Http\Controllers\Admin\ResetPassword::class, "index"])->name("reset-password");