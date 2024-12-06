<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('page', ['slug' => 'home']);
});


Route::get('/products/search', [ProductController::class, 'ajaxSearchView'])->name('products.search');
Route::get('/products/ajax-search', [ProductController::class, 'ajaxSearch'])->name('products.ajax-search');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}/{title}', [ProductController::class, 'show'])->name('detail');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/results', [SearchController::class, 'searchResults'])->name('products.search.results');
Route::get('/{slug}', [HomeController::class, 'show'])->name('page');
