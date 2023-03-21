<?php
use App\Http\Controllers\Admin\UserMangementController;

Route::get('home',[App\Http\Controllers\Admin\HomeController::class, "index"])->name("home");
Route::get('profile',[App\Http\Controllers\Admin\UserProfileController::class, "index"])->name("profile");
Route::post('profile',[App\Http\Controllers\Admin\UserProfileController::class, "update"])->name("profile.update");
Route::get('user-management',[App\Http\Controllers\Admin\UserMangementController::class,"index"])->name("user_management");
Route::get('user-management/create',[App\Http\Controllers\Admin\UserMangementController::class,"createIndex"])->name("user_management.create");
Route::post('user-management/create',[App\Http\Controllers\Admin\UserMangementController::class,"create"])->name("user_management.create.perform");
Route::prefix('product')->group(function (){
    Route::get('list',[App\Http\Controllers\Admin\ProductController::class, "listAll"])->name("product.list");
    Route::get('create',[App\Http\Controllers\Admin\ProductController::class,"create"])->name("product.create");
    Route::post('create',[App\Http\Controllers\Admin\ProductController::class,"store"])->name("create_product");
    Route::get("edit/{product}",[App\Http\Controllers\Admin\ProductController::class,"edit"]);
    Route::post("edit/{product}",[App\Http\Controllers\Admin\ProductController::class,"update"]);
    Route::post("delete/{product}",[App\Http\Controllers\Admin\ProductController::class,"delete"]);
});

Route::prefix('categories')->group(function (){
    Route::get('list',[App\Http\Controllers\Admin\CategoriesMangementController::class, "listAll"])->name("categories.list");
    Route::get('create',[App\Http\Controllers\Admin\CategoriesMangementController::class,"create"])->name("categories.create");
    Route::post('create',[App\Http\Controllers\Admin\CategoriesMangementController::class,"store"])->name("create_categories");
    Route::get("edit/{id}",[App\Http\Controllers\Admin\CategoriesMangementController::class,"edit"]);
    Route::post("edit/{id}",[App\Http\Controllers\Admin\CategoriesMangementController::class,"update"]);
    Route::post("delete/{category}",[App\Http\Controllers\Admin\CategoriesMangementController::class,"delete"]);
});