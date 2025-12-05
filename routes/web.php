<?php

use App\Livewire\Admin\Customers;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Orders;
use App\Livewire\Admin\Products;
use App\Livewire\Admin\Profile;
use App\Livewire\Admin\Reports;
use App\Livewire\Admin\Settings;
use App\Livewire\AllProducts;
use App\Livewire\Cart;
use App\Livewire\Favorites;
use App\Livewire\HomePage;
use App\Livewire\Login;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/produtos', AllProducts::class)->name('products.index');
Route::get('/produto/{slug}', ProductDetail::class)->name('product.detail');
Route::get('/carrinho', Cart::class)->name('cart');
Route::get('/favoritos', Favorites::class)->name('favorites');

// Auth Routes
Route::get('/login', Login::class)->name('login');

// Social Auth Routes
Route::get('/auth/{provider}', [\App\Http\Controllers\SocialAuthController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [\App\Http\Controllers\SocialAuthController::class, 'callback'])->name('auth.callback');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');
    Route::get('/produtos', Products::class)->name('admin.products');
    Route::get('/pedidos', Orders::class)->name('admin.orders');
    Route::get('/clientes', Customers::class)->name('admin.customers');
    Route::get('/relatorios', Reports::class)->name('admin.reports');
    Route::get('/configuracoes', Settings::class)->name('admin.settings');
    Route::get('/perfil', Profile::class)->name('admin.profile');
});
