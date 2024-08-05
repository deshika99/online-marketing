<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/home/dresses', 'dress')->name('dress');
Route::view('/home/toys', 'toys')->name('toys');
Route::view('/home/cosmetics', 'cosmetics')->name('cosmetics');
Route::view('/home/gift-items', 'gifts')->name('gifts');
Route::view('/home/school_equipments', 'school_equipments')->name('school_equipments');
Route::view('/home/phone_Accessories', 'phone_Accessories')->name('phone_Accessories');
Route::view('/home/baby_things', 'baby_things')->name('baby_things');
Route::view('/home/house_hold_goods', 'house_hold_goods')->name('house_hold_goods');
Route::view('/home/food', 'food')->name('food');


Route::view('/home/product', 'single_product_page')->name('single_product_page');
Route::view('/home/shopping-cart', 'shopping_cart')->name('shopping_cart');
Route::view('/home/shopping-cart/checkout', 'checkout')->name('checkout');



Route::get('home/My-Account', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('home/My-Account/edit-profile', function () {
    return view('edit-profile');
})->name('edit-profile');

Route::get('home/My-Account/order-history', function () {
    return view('order-history');
})->name('order-history');

Route::get('home/My-Account/order-details', function () {
    return view('order-details');
})->name('order-details');

Route::get('home/My-Account/change-password', function () {
    return view('change-password');
})->name('change-password');

Route::get('home/My-Account/points', function () {
    return view('points');
})->name('points');

Route::get('home/My-Account/addresses', function () {
    return view('addresses');
})->name('addresses');

Route::get('home/My-Account/logout', function () {
    return view('logout');
})->name('logout');
