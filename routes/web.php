<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AffiliateProductController;
use App\Http\Controllers\AffiliateCustomerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\UserDashboardController;


Route::get('/', [HomeController::class, 'index'])->name('home');



Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::view('/home/help-center', 'helpcenter')->name('helpcenter');
Route::get('/home/products/{category?}/{subcategory?}/{subsubcategory?}', [ProductController::class, 'showProductsByCategory'])
    ->name('user_products');
Route::get('/product/{product_id?}', [ProductController::class, 'show'])->name('single_product_page');
Route::get('/home/all_items', [ProductController::class, 'show_all_items'])->name('all_items');


Route::view('/home/affiliate/all', 'aff_all')->name('aff_all');
Route::view('/home/affiliate/single', 'aff_single')->name('aff_single');
Route::view('/cart/payment', 'payment')->name('payment');


//member dashboard
Route::get('home/My-Account', function () {
    return view('member_dashboard.dashboard');
})->name('dashboard');

Route::get('home/My-Account/edit-profile', function () {
    return view('member_dashboard.edit-profile');
})->name('edit-profile');

Route::get('home/My-Account/myorders', [UserDashboardController::class, 'myOrders'])->name('myorders');
Route::get('home/My-Account/order-details/{order_code}', [UserDashboardController::class, 'orderDetails'])->name('myorder-details');
Route::post('/order/cancel/{order_code}', [UserDashboardController::class, 'cancelOrder']);
Route::post('/confirm-delivery', [UserDashboardController::class, 'confirmDelivery'])->name('confirm-delivery');



Route::get('home/My-Account/change-password', function () {
    return view('member_dashboard.change-password');
})->name('change-password');

Route::get('home/My-Account/points', function () {
    return view('member_dashboard.points');
})->name('points');

Route::get('home/My-Account/addresses', function () {
    return view('member_dashboard.addresses');
})->name('addresses');

Route::get('home/My-Account/logout', function () {
    return view('logout');
});

Route::get('/affiliate/dashboard/payment/bank_acc', function () {
    return view('bank_acc');
});


Auth::routes();


Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/shopping-cart', [CartController::class, 'showCart'])->name('shopping_cart');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{index}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/order/store', [CustomerOrderController::class, 'store'])->name('order.store');

Route::get('/dashboard/profile/edit', [UserDashboardController::class, 'editProfile'])->name('user.editProfile');
Route::put('/dashboard/profile/update', [UserDashboardController::class, 'updateProfile'])->name('user.updateProfile');



//affiliate dashboard
Route::view('/home/affiliate/affiliate_home', 'aff_home')->name('aff_home');
Route::post('/home/affiliate/register', [AffiliateCustomerController::class, 'register'])->name('aff_reg');
Route::view('/home/affiliate/register', 'aff_reg')->name('register_form');
Route::post('/home/affiliate/login', [AffiliateCustomerController::class, 'login'])->name('aff_login');
Route::get('/affiliate/dashboard', [AffiliateCustomerController::class, 'index'])->name('index');
Route::post('/affiliate/logout', [AffiliateCustomerController::class, 'logout'])->name('aff_logout');
Route::get('/affiliate/dashboard/ad_center', [AffiliateProductController::class, 'showAdCenter'])->name('ad_center');
Route::get('/affiliate/dashboard/ad_center/{product_id}/promote-modal', [AffiliateProductController::class, 'showPromoteModal'])->name('products.promoteModal');
Route::get('/affiliate/dashboard/ad_center/download-images', [AffiliateProductController::class, 'downloadImages'])->name('products.downloadImages');

Route::view('/affiliate/dashboard/code_center', 'affiliate_dashboard.code_center')->name('code_center');
Route::get('/affiliate/dashboard/ad_center/{id}/promote-modal', [AffiliateProductController::class, 'showPromoteModal'])->name('products.promoteModal');

Route::get('/affiliate/dashboard/ad_center/download-images', [AffiliateProductController::class, 'downloadImages'])->name('products.downloadImages');

Route::view('/affiliate/dashboard/code_center', 'affiliate_dashboard.code_center')->name('code_center');

Route::view('/affiliate/dashboard/incentive_campaign', 'affiliate_dashboard.incentive_campaign')->name('incentive_campaign');

Route::view('/affiliate/dashboard/reports/traffic_report', 'affiliate_dashboard.traffic_report')->name('traffic_report');
Route::view('/affiliate/dashboard/reports/income_report', 'affiliate_dashboard.income_report')->name('income_report');
Route::view('/affiliate/dashboard/reports/order_tracking', 'affiliate_dashboard.order_tracking')->name('order_tracking');
Route::view('/affiliate/dashboard/reports/transaction_product_report', 'affiliate_dashboard.transaction_product_report')->name('transaction_product_report');
Route::view('/affiliate/dashboard/payment/withdrawals', 'affiliate_dashboard.withdrawals')->name('withdrawals');
Route::view('/affiliate/dashboard/payment/account_balance', 'affiliate_dashboard.account_balance')->name('account_balance');

Route::view('/affiliate/dashboard/tool', 'affiliate_dashboard.tool')->name('tool');

Route::view('/affiliate/dashboard/payment/withdrawals', 'affiliate_dashboard.withdrawals')->name('withdrawals');
Route::view('/affiliate/dashboard/payment/account_balance', 'affiliate_dashboard.account_balance')->name('account_balance');
Route::view('/affiliate/dashboard/payment/payment_info', 'affiliate_dashboard.payment_info')->name('payment_info');
Route::view('/affiliate/dashboard/payment/bank_acc', 'affiliate_dashboard.bank_acc')->name('bank_acc');
Route::post('/affiliate/dashboard/payment/bank_acc', [PaymentController::class, 'storeBankAccount'])->name('bank.acc');

Route::view('/affiliate/dashboard/payment/commission_rules', 'affiliate_dashboard.commission_rules')->name('commission_rules');

Route::view('/affiliate/dashboard/account/mywebsites_page', 'affiliate_dashboard.mywebsites_page')->name('mywebsites_page');
Route::view('/affiliate/dashboard/account/tracking_id', 'affiliate_dashboard.tracking_id')->name('tracking_id');


//admin dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.index');
Route::get('/admin/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/subcategories/{categoryId}', [ProductController::class, 'getSubcategories']);
Route::get('/sub-subcategories/{subcategoryId}', [ProductController::class, 'getSubSubcategories']);
Route::get('/admin/products/add_products', [ProductController::class, 'showCategory'])->name('add_products');
Route::post('/admin/products/add_products', [ProductController::class, 'store'])->name('store_product');
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('update_product');
Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('delete_product');

Route::get('/admin/aff_customers', [AffiliateCustomerController::class, 'showAffCustomers'])->name('aff_customers');
Route::patch('/admin/aff_customers/{id}/status', [AffiliateCustomerController::class, 'updateStatus'])->name('aff_customers.updateStatus');

Route::get('/admin/users', [UserController::class, 'show_users'])->name('show_users');
Route::get('/admin/users/{id}/edit', [UserController::class, 'editUserPage'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('delete_user');
Route::get('/admin/users/{id}', [UserController::class, 'getUserDetails']);
Route::post('/admin/users', [UserController::class, 'store'])->name('admin_users.store');

Route::view('/admin/customer_inquiries', 'admin_dashboard.customer_inquiries')->name('customer_inquiries');

Route::get('/admin/category', [CategoryController::class, 'showCategories'])->name('category');
Route::post('/admin/category/add', [CategoryController::class, 'store'])->name('category_add');
Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('edit_category');
Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('update_category');

Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders');
Route::get('/admin/order-details', [OrderController::class, 'show'])->name('customerorder_details');
Route::post('/set-order-code', [OrderController::class, 'setOrderCode'])->name('set-order-code');
Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::put('/admin/orders/{id}/status', [OrderController::class, 'updateOrderStatus'])->name('update_order_status');


Route::view('/admin/customers', 'admin_dashboard.customers')->name('customers');

