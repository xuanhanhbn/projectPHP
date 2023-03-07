<?php

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

Route::middleware(["auth","admin"])->prefix("admin")->group(function (){
    include_once("admin.php");
    Route::prefix('product')->group(function (){
        Route::get('/list',[App\Http\Controllers\Admin\ProductController::class, "listAll"])->name("admin_product.list");
        Route::get('/create',[App\Http\Controllers\Admin\ProductController::class,"create"])->name("admin_product.create");
        Route::post('/create',[App\Http\Controllers\Admin\ProductController::class,"store"])->name("create_product");
        Route::get("/edit/{product}",[App\Http\Controllers\Admin\ProductController::class,"edit"]);
        Route::post("/edit/{product}",[App\Http\Controllers\Admin\ProductController::class,"update"]);
        Route::post("/delete/{product}",[App\Http\Controllers\Admin\ProductController::class,"delete"]);
    });
});
Route::prefix('/')->group(function () {
    include_once("user.php");
    include_once("public.php");
});
