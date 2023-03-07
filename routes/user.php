<?php
 Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name("user_home");
 Route::get('/about', [App\Http\Controllers\User\AboutController::class, 'index'])->name("user_about");
 Route::get('/contact', [App\Http\Controllers\User\ContactController::class, 'index'])->name("user_contact");
 Route::get('/products', [App\Http\Controllers\User\ProductController::class, 'indexListing'])->name("user_product-listing");
 Route::get('/product', [App\Http\Controllers\User\ProductController::class, 'indexSingle'])->name("user_product-single");