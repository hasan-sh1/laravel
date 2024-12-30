<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PuzzleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ItemExchangeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hasan', function () {
    return view('profile.hasan.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/shop', [GameController::class, 'showShop'])->name('shop');
Route::middleware(['auth'])->group(function () {
    Route::post('/puzzle/{puzzle}/check', [GameController::class, 'checkPuzzle'])->name('checkPuzzle');
    Route::post('/product/{product}/buy', [GameController::class, 'buyProduct'])->name('buyProduct');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/puzzles', [PuzzleController::class, 'index'])->name('puzzles.index');
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/my-purchases', [PurchaseController::class, 'index'])->name('my.purchases');
    Route::delete('/purchase/{purchase}', [PurchaseController::class, 'destroy'])->name('deletePurchase');
});

Route::post('/buy-product/{product}', [ShopController::class, 'buyProduct'])->name('buyProduct');



Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])
        ->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])
        ->name('admin.products.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/items/exchange', [ItemExchangeController::class, 'exchange'])->name('items.exchange');
    Route::get('/my-items', [ItemExchangeController::class, 'myItems'])->name('items.my-items');
});
Route::get('/my-items', [ItemExchangeController::class, 'myItems'])->name('items.my-items');

require __DIR__.'/auth.php';
