<?php

use App\Livewire\AllProducts;
use App\Livewire\HomePage;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/produtos', AllProducts::class)->name('products.index');
Route::get('/produto/{slug}', ProductDetail::class)->name('product.detail');
