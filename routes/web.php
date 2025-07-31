<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.redirect')->get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $categories = Category::with('products')->get();
    $featuredProducts = Product::where('is_active',true)->offset(0)->limit(4)->get();
    $latestProducts = Product::where('is_active',true)->latest()->offset(0)->limit(4)->get();
    $bestSellers = Product::where('is_active',true)->orderby('name','asc')->limit(4)->get();
    return view('dashboard',compact('featuredProducts','bestSellers','latestProducts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('categories',AdminCategoryController::class)->except('show');
    Route::resource('products',AdminProductController::class);
    Route::resource('orders',OrderController::class);
});

//  Category Routes
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{category:slug}',[CategoryController::class,'show'])->name('categories.show');


//  Products Routes
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/{slug}',[ProductController::class,'show'])->name('products.show');

// Checkout Routes
Route::get('/checkout/{product}',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('/checkout/{product}',[CheckoutController::class,'store'])->name('checkout.store');



Route::view('/about-us','about')->name('about-us');

require __DIR__.'/auth.php';
