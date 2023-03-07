<?php
Route::get('/',[App\Http\Controllers\Admin\HomeController::class, "index"])->name("admin_home");
Route::get('/profile',[App\Http\Controllers\Admin\UserProfileController::class, "index"])->name("admin_profile");
Route::post('/profile',[App\Http\Controllers\Admin\UserProfileController::class, "update"])->name("admin_profile.update");
Route::get('/{page}',[App\Http\Controllers\Admin\PageController::class, "index"])->name("admin_page");