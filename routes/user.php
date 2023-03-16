<?php

 Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'index'])->name("user_cart");
 Route::post('/cart', [App\Http\Controllers\User\CartController::class, 'add'])->name("user_cart.add");
 Route::post('/payment', [App\Http\Controllers\User\CartController::class, 'payment'])->name("payment");
 Route::get('/liked', [App\Http\Controllers\User\ProductController::class, 'liked'])->name("liked-product");

