<?php

 Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'index'])->name("user_cart");
 Route::post('/cart', [App\Http\Controllers\User\CartController::class, 'add'])->name("user_cart.add");
 Route::post('/cart/update', [App\Http\Controllers\User\CartController::class, 'update'])->name("user_cart.update");
 Route::post('/payment', [App\Http\Controllers\User\CartController::class, 'payment'])->name("payment");
 Route::post('/cart/transaction', [App\Http\Controllers\User\CartController::class, 'transaction'])->name("transaction");
 Route::get('/liked', [App\Http\Controllers\User\ProductController::class, 'liked'])->name("liked-product");
 Route::post('/liked', [App\Http\Controllers\User\ProductController::class, 'like'])->name("liked-products-create");
 Route::get('/order/{order_id}', [App\Http\Controllers\User\OrderController::class, 'index'])->name("user_order");
 Route::get('/orders', [App\Http\Controllers\User\OrderController::class, 'indexListing'])->name("user_order-listing");
