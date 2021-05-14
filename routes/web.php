<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ShopifyController;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::prefix('/shopify')->group(function() {
        Route::get('/connect', [ShopifyController::class, 'connect'])->name('shopify-connect');
        Route::get('/disconnect', [ShopifyController::class, 'disconnect'])->name('shopify-disconnect');
        Route::get('/redirect', [ShopifyController::class, 'confirm'])->name('shopify-confirm');
    });
});
