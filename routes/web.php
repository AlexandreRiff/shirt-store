<?php

use App\Livewire\Admin\Customers;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Orders;
use App\Livewire\Admin\Products;
use App\Livewire\Admin\Reports;
use App\Livewire\Admin\Settings;
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

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');
    Route::get('/produtos', Products::class)->name('admin.products');
    Route::get('/pedidos', Orders::class)->name('admin.orders');
    Route::get('/clientes', Customers::class)->name('admin.customers');
    Route::get('/relatorios', Reports::class)->name('admin.reports');
    Route::get('/configuracoes', Settings::class)->name('admin.settings');
});
