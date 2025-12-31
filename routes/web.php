<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Session;


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');



// Route::get('/products/{id}/details', [ProductController::class, 'productDetails'])->name('product.details');
// Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');
// Route::get('/careers/{id}/details', [ProductController::class, 'careerDetails'])->name('career.details');
// Route::get('blogs/{id}/details', [FrontendController::class, 'blogDetails'])->name('blog.details');





Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/cache-clear', [DashboardController::class, 'cacheClear'])->name('cache-clear');

        Route::resource('categories', CategoryController::class)->except(['create', 'show']);
        Route::resource('subcategories', SubcategoryController::class)->except(['create', 'show']);

        Route::get('/products/{slug}/show', [ProductController::class, 'showDetails'])->name('products.show');

        Route::resource('products', ProductController::class)->except(['show']);


        Route::get('categories/{id}/subcategories', [ProductController::class, 'getSubcategories'])->name('categories.subcategories');
        
        Route::resource('contacts', \App\Http\Controllers\ContactController::class)->only(['index', 'destroy']);
    });


});

require __DIR__.'/auth.php';
