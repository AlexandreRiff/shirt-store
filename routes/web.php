<?php

use App\Livewire\AllProducts;
use App\Livewire\Cart;
use App\Livewire\Favorites;
use App\Livewire\HomePage;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/produtos', AllProducts::class)->name('products.index');
Route::get('/produto/{slug}', ProductDetail::class)->name('product.detail');
Route::get('/carrinho', Cart::class)->name('cart');
Route::get('/favoritos', Favorites::class)->name('favorites');
