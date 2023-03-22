<?php

 Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'index'])->name("user_cart");
 Route::post('/cart', [App\Http\Controllers\User\CartController::class, 'add'])->name("user_cart.add");
 Route::post('/cart/update', [App\Http\Controllers\User\CartController::class, 'update'])->name("user_cart.update");
Route::get('/payment', [App\Http\Controllers\User\CartController::class, 'payment']);
Route::post('/payment', [App\Http\Controllers\User\CartController::class, 'payment'])->name("payment");
 Route::get('/liked', [App\Http\Controllers\User\ProductController::class, 'liked'])->name("liked-product");
 Route::post('/liked', [App\Http\Controllers\User\ProductController::class, 'like'])->name("liked-products-create");
