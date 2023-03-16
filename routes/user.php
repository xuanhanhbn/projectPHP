<?php

 Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'index'])->name("user_cart");
 Route::post('/cart', [App\Http\Controllers\User\CartController::class, 'add'])->name("user_cart.add");
 Route::get('/payment', [App\Http\Controllers\User\CartController::class, 'payment'])->name("payment");

