<?php
Route::get('/',[App\Http\Controllers\Admin\HomeController::class, "index"])->name("admin_home");
Route::get('/profile',[App\Http\Controllers\Admin\UserProfileController::class, "index"])->name("admin_profile");
Route::post('/profile',[App\Http\Controllers\Admin\UserProfileController::class, "update"])->name("admin_profile.update");
Route::get('/{page}',[App\Http\Controllers\Admin\PageController::class, "index"])->name("admin_page");
Route::prefix('product')->group(function (){
    Route::get('/list',[App\Http\Controllers\Admin\ProductController::class, "listAll"])->name("admin_product.list");
    Route::get('/create',[App\Http\Controllers\Admin\ProductController::class,"create"])->name("admin_product.create");
    Route::post('/create',[App\Http\Controllers\Admin\ProductController::class,"store"])->name("create_product");
    Route::get("/edit/{product}",[App\Http\Controllers\Admin\ProductController::class,"edit"]);
    Route::post("/edit/{product}",[App\Http\Controllers\Admin\ProductController::class,"update"]);
    Route::post("/delete/{product}",[App\Http\Controllers\Admin\ProductController::class,"delete"]);
});