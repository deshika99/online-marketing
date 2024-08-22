<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\AffiliateProductController;
use App\Http\Controllers\AffiliateCustomerController;

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


Route::view('/home/affiliate/register', 'aff_reg')->name('aff_reg');
Route::view('/home/affiliate/login', 'aff_login')->name('aff_login');
Route::view('/home/affiliate/all', 'aff_all')->name('aff_all');
Route::view('/home/affiliate/single', 'aff_single')->name('aff_single');
Route::view('/cart/payment', 'payment')->name('payment');


//member dashboard
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




Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('shopping_cart');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete/{index}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/product', [ProductController::class, 'show'])->name('single_product_page');
Route::post('/order/store', [CustomerOrderController::class, 'store'])->name('order.store');


//affiliate dashboard
Route::view('/affiliate/dashboard', 'affiliate_dashboard.index')->name('index');
Route::get('/affiliate/dashboard/ad_center', [AffiliateProductController::class, 'showAdCenter'])->name('ad_center');

Route::view('/affiliate/dashboard/code_center', 'affiliate_dashboard.code_center')->name('code_center');

Route::view('/affiliate/dashboard/reports/traffic_report', 'affiliate_dashboard.traffic_report')->name('traffic_report');
Route::view('/affiliate/dashboard/reports/income_report', 'affiliate_dashboard.income_report')->name('income_report');
Route::view('/affiliate/dashboard/reports/order_tracking', 'affiliate_dashboard.order_tracking')->name('order_tracking');
Route::view('/affiliate/dashboard/reports/transaction_product_report', 'affiliate_dashboard.transaction_product_report')->name('transaction_product_report');

Route::view('/affiliate/dashboard/payment/withdrawals', 'affiliate_dashboard.withdrawals')->name('withdrawals');
Route::view('/affiliate/dashboard/payment/account_balance', 'affiliate_dashboard.account_balance')->name('account_balance');

Route::view('/affiliate/dashboard/account/mywebsites_page', 'affiliate_dashboard.mywebsites_page')->name('mywebsites_page');
Route::view('/affiliate/dashboard/account/tracking_id', 'affiliate_dashboard.tracking_id')->name('tracking_id');


//admin dashboard
Route::view('/admin/dashboard', 'admin_dashboard.index')->name('admin.index');
Route::get('/admin/products/add_products', [ProductController::class, 'showCategory'])->name('add_products');
Route::post('/admin/products/add_products', [ProductController::class, 'store'])->name('store_product');
Route::get('/admin/products', [ProductController::class, 'showProducts'])->name('products');

Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('update_product');
Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('delete_product');

Route::get('/admin/aff_customers', [AffiliateCustomerController::class, 'showAffCustomers'])->name('aff_customers');
Route::patch('/admin/aff_customers/{id}/status', [AffiliateCustomerController::class, 'updateStatus'])->name('aff_customers.updateStatus');



