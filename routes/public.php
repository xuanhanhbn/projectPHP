<?php
Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, "index"])->name("login");
Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, "login"])->name("login.perform");
Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, "logout"])->name("logout");
Route::get('/register', [App\Http\Controllers\Admin\RegisterController::class, "index"])->name("register");
Route::post('/register', [App\Http\Controllers\Admin\RegisterController::class, "register"])->name("register.perform");
Route::get('/reset-password', [App\Http\Controllers\Admin\ResetPassword::class, "index"])->name("reset-password");

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name("user_home");
Route::get('/about', [App\Http\Controllers\User\AboutController::class, 'index'])->name("user_about");
Route::get('/contact', [App\Http\Controllers\User\ContactController::class, 'index'])->name("user_contact");
Route::get('/products', [App\Http\Controllers\User\ProductController::class, 'indexListing'])->name("user_product-listing");
Route::get('/products/{products}',[App\Http\Controllers\User\ProductController::class,'indexCategory']);
Route::get('/product/{id}', [App\Http\Controllers\User\ProductController::class, 'indexSingle'])->name("user_product-single");