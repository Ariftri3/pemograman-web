<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\HomepageController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/',[HomepageController::class,'index']);
Route::get('product/{slug}', [HomepageController::class, 'product']);
Route::get('/', [HomepageController::class, 'index']);
Route::get('products', [HomepageController::class, 'products']);
Route::get('product/{slug}', [HomepageController::class, 'product']);
Route::get('categories',[HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);

// Route::get('/', function(){
//     return view('web.product');
//    });

//  Route::get('product/{slug}', function($slug){
//     return view('web.single_product');});

//     Route::get('categories', function(){
//         return view('web.categories');
//        });

//        Route::get('category/{slug}', function($slug){
//         return view('web.single_category');
//        });

//        Route::get('cart', function(){
//         return view('web.cart');
//        });

//        Route::get('checkout', function(){
//         return view('web.checkout');
//        });
       
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
