<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SpecialOffersController;
use App\Http\Controllers\AffiliateProductController;
use App\Http\Controllers\AffiliateCustomerController;
use App\Http\Controllers\AffiliateTrackingController;
use App\Http\Controllers\AffiliateReportController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\AffiliateLinkController;

use App\Http\Controllers\SalesController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AffiliateDashboardController;


use Illuminate\Http\Request;     //contact form

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::view('/home/help-center', 'helpcenter')->name('helpcenter');
Route::get('/home/products/{category?}/{subcategory?}/{subsubcategory?}', [ProductController::class, 'showProductsByCategory'])
    ->name('user_products');
Route::get('/product/{product_id?}', [ProductController::class, 'show'])->name('single_product_page');
Route::get('/home/all_items', [ProductController::class, 'show_all_items'])->name('all_items');
Route::get('/home/special_offer_products', [SpecialOffersController::class, 'showProductsWithSpecialOffers'])->name('special_offerproducts');
Route::post('/filter-products', [ProductController::class, 'filterProducts']);
Route::get('/best-sellers', [SpecialOffersController::class, 'bestSellers'])->name('best_sellers');


Route::view('/home/affiliate/all', 'aff_all')->name('aff_all');
Route::view('/home/affiliate/single', 'aff_single')->name('aff_single');

Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');//inquiry 
Route::get('/admin/customer_inquiries', [InquiryController::class, 'showCustomerInquiries'])->name('customer_inquiries');




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
Route::get('home/My-Account/My-Reviews', [UserDashboardController::class, 'myReviews'])->name('myreviews');
//new route dashboard
Route::get('home/My-Account/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');



Route::get('home/My-Account/addresses', [UserDashboardController::class, 'showAddresses'])->name('addresses');
Route::post('home/My-Account/addresses/update', [UserDashboardController::class, 'updateAddress'])->name('updateAddress');
Route::post('home/My-Account/addresses/delete', [UserDashboardController::class, 'deleteAddress'])->name('deleteAddress');
Route::post('home/My-Account/addresses/store', [UserDashboardController::class, 'storeAddress'])->name('storeAddress');

//write-reviews

Route::get('/member-dashboard/write-reviews', [UserDashboardController::class, 'writeReview'])->name('write.reviews');
Route::post('/member-dashboard/reviews', [UserDashboardController::class, 'storeReview'])->name('reviews.store');



Route::get('home/My-Account/change-password', function () {
    return view('member_dashboard.change-password');
})->name('change-password');


Route::get('home/My-Account/addresses', function () { 
    return view('member_dashboard.addresses');
})->name('addresses');



//new return button
Route::get('home/My-Account/returns', function () { 
    return view('member_dashboard.returns');
})->name('returns');

// new route return details page
Route::get('home/My-Account/returns-details', function () {
    return view('member_dashboard.returns-details');
})->name('returns.details');




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

Route::get('/payment/{order_code}', [PaymentController::class, 'payment'])->name('payment');

Route::post('/order/confirm-cod/{order_code}', [PaymentController::class, 'confirmCod'])->name('order.confirm.cod');

Route::get('/order/order_received/{order_code}', [PaymentController::class, 'getOrderDetails'])->name('order.thankyou');



Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/order/store', [CustomerOrderController::class, 'store'])->name('order.store');



Route::get('/dashboard/profile/edit', [UserDashboardController::class, 'editProfile'])->name('user.editProfile');
Route::put('/dashboard/profile/update', [UserDashboardController::class, 'updateProfile'])->name('user.updateProfile');

Route::post('/dashboard/password/update', [UserDashboardController::class, 'updatePassword'])->name('password.update');



//affiliate dashboard
Route::view('/home/affiliate/affiliate_home', 'aff_home')->name('aff_home');
Route::post('/home/affiliate/register', [AffiliateCustomerController::class, 'register'])->name('aff_reg');
Route::view('/home/affiliate/register', 'aff_reg')->name('register_form');
Route::post('/home/affiliate/login', [AffiliateCustomerController::class, 'login'])->name('aff_login');
Route::get('/affiliate/dashboard', [AffiliateCustomerController::class, 'index'])->name('index');
Route::post('/affiliate/logout', [AffiliateCustomerController::class, 'logout'])->name('aff_logout');
Route::get('/affiliate/dashboard/ad_center', [AffiliateProductController::class, 'showAdCenter'])->name('ad_center');
Route::post('/affiliate/promo/maritial/genaratr', [AffiliateCustomerController::class, 'promomatirials'])->name('promo_matirials');
Route::get('/affiliate/dashboard/ad_center/{product_id}/promote-modal', [AffiliateProductController::class, 'showPromoteModal'])->name('products.promoteModal');
Route::get('/affiliate/dashboard/ad_center/download-images', [AffiliateProductController::class, 'downloadImages'])->name('products.downloadImages');
Route::get('/affiliate/dashboard/ad_center/{id}/promote-modal', [AffiliateProductController::class, 'showPromoteModal'])->name('products.promoteModal');
Route::get('/affiliate/dashboard/ad_center/download-images', [AffiliateProductController::class, 'downloadImages'])->name('products.downloadImages');

Route::post('/generate-promo', [AffiliateProductController::class, 'generatePromo'])->name('generate.promo');



Route::view('/affiliate/dashboard/incentive_campaign', 'affiliate_dashboard.incentive_campaign')->name('incentive_campaign');


Route::view('/affiliate/dashboard/reports/income_report', 'affiliate_dashboard.income_report')->name('income_report');
Route::view('/affiliate/dashboard/reports/order_tracking', 'affiliate_dashboard.order_tracking')->name('order_tracking');
Route::view('/affiliate/dashboard/reports/transaction_product_report', 'affiliate_dashboard.transaction_product_report')->name('transaction_product_report');
Route::view('/affiliate/dashboard/payment/withdrawals', 'affiliate_dashboard.withdrawals')->name('withdrawals');
Route::view('/affiliate/dashboard/payment/account_balance', 'affiliate_dashboard.account_balance')->name('account_balance');


Route::get('/affiliate-tool', [AffiliateLinkController::class, 'showAffiliateForm'])->name('affiliate.tool');
Route::post('/affiliate/tool/create/affiliate_link', [AffiliateLinkController::class, 'generateNewLink'])->name('genarate_tracking_Link');
Route::get('/track/{tracking_id}/{product_id}', [AffiliateLinkController::class, 'trackClick'])->name('affiliate.track');


Route::post('/track-referral/{tracking_id}', [AffiliateLinkController::class, 'trackReferral'])->name('affiliate.trackReferral');
Route::get('/affiliate/dashboard/code_center', [AffiliateLinkController::class, 'codeCenter'])->name('code_center');




Route::view('/affiliate/dashboard/payment/account_balance', 'affiliate_dashboard.account_balance')->name('account_balance');
Route::get('/affiliate/dashboard/payment/bank_acc', [PaymentController::class, 'bank_acc'])->name('bank_acc');
Route::post('/affiliate/dashboard/payment/bank_acc', [PaymentController::class, 'updatebank'])->name('updatebank');
Route::post('/affiliate/dashboard/payment/bank_acc', [PaymentController::class, 'paymentrequest'])->name('paymentrequest');


Route::view('/affiliate/dashboard/payment/commission_rules', 'affiliate_dashboard.commission_rules')->name('commission_rules');

Route::get('/affiliate/dashboard/account/mywebsites_page', [AffiliateDashboardController::class, 'index'])->name('mywebsites_page');
Route::get('/affiliate/dashboard/account/tracking_id', [AffiliateTrackingController::class, 'index'])->name('tracking_id');
Route::post('/affiliate/dashboard/store/tracking_id', [AffiliateTrackingController::class, 'store'])->name('tracking_id_store');
Route::put('/raffletickets/{id}/setDefault', [AffiliateTrackingController::class, 'setDefault'])->name('raffletickets.setDefault');
Route::delete('/raffletickets/{id}', [AffiliateTrackingController::class, 'destroy'])->name('raffletickets.destroy');

Route::get('/raffletickets/{id}/report', [AffiliateReportController::class, 'report'])->name('raffletickets.report');
Route::get('/affiliate/dashboard/reports/traffic_report',[AffiliateReportController::class, 'trafficreport'] )->name('traffic_report');
Route::get('/affiliate/dashboard/payment/withdrawals', [AffiliateReportController::class, 'withdrawals'] )->name('withdrawals');
Route::get('/affiliate/dashboard/payment/payment_info', [AffiliateReportController::class, 'showPaymentInfo'])->name('payment_info');
Route::post('/affiliate/dashboard/payment/realtime_tracking', [AffiliateReportController::class, 'realtimereport'])->name('realtime_tracking');


//admin dashboard
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Middleware\AdminAuth;


Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');

Route::middleware([App\Http\Middleware\AdminAuth::class])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.index');
    // other routes
});


Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


// Route to display the admin profile
Route::get('/admin/profile', [AdminProfileController::class, 'showProfile'])->name('admin.profile');

// Route to handle profile updates
Route::post('/admin/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');

// Route to handle password updates
Route::post('/admin/profile/password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.password.update');


Route::get('/admin/edit_offers/{id}', [SpecialOffersController::class, 'edit'])->name('edit_offers');
Route::put('/admin/edit_offers/{id}', [SpecialOffersController::class, 'update']);
Route::get('/admin/add_offers', [SpecialOffersController::class, 'createOffer'])->name('add_offers');
Route::post('/admin/store_offers', [SpecialOffersController::class, 'storeOffer'])->name('store_offers');
Route::get('/admin/special_offers', [SpecialOffersController::class, 'showOffers'])->name('special_offers');
Route::delete('/admin/special_offers/delete/{id}', [SpecialOffersController::class, 'destroy'])->name('delete_offer');


Route::get('/admin/add_sales', [SalesController::class, 'createsales'])->name('add_sales');
Route::post('/admin/store_sales', [SalesController::class, 'storeSales'])->name('store_sales');
Route::get('/admin/flash_sales', [SalesController::class, 'showSales'])->name('flash_sales');
Route::post('/sales/store', [SalesController::class, 'storeSale'])->name('store_sales');
Route::get('/admin/edit_sales/{id}', [SalesController::class, 'edit'])->name('edit_sales');
Route::delete('/admin/destroy_sales/{id}', [SalesController::class, 'destroy'])->name('destroy_sales');
Route::post('/admin/update-sale/{id}', [SalesController::class, 'update'])->name('update_sale');
Route::delete('admin/delete-sale/{id}', [SalesController::class, 'destroy'])->name('delete_sale');

Route::get('/home/flash_sales', [SalesController::class, 'saleProducts'])->name('sale_products');


Route::get('/admin/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/subcategories/{categoryId}', [ProductController::class, 'getSubcategories']);
Route::get('/sub-subcategories/{subcategoryId}', [ProductController::class, 'getSubSubcategories']);
Route::get('/admin/products/add_products', [ProductController::class, 'showCategory'])->name('add_products');
Route::post('/admin/products/add_products', [ProductController::class, 'store'])->name('store_product');
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('edit_product');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('update_product');
Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('delete_product');
Route::get('/admin/product-details/{id}', [ProductController::class, 'showProductDetails'])->name('product-details');


Route::get('/admin/aff_customers', [AffiliateCustomerController::class, 'showAffCustomers'])->name('aff_customers');
Route::patch('/admin/aff_customers/{id}/status', [AffiliateCustomerController::class, 'updateStatus'])->name('aff_customers.updateStatus');

Route::get('/admin/users', [UserController::class, 'show_users'])->name('show_users');
Route::get('/admin/users/{id}/edit', [UserController::class, 'editUserPage'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('delete_user');
Route::get('/admin/users/{id}', [UserController::class, 'getUserDetails']);
Route::post('/admin/users', [UserController::class, 'store'])->name('admin_users.store');



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

Route::get('/admin/customers', [CustomerController::class, 'show_customers'])->name('customers');
Route::get('/admin/customer-details/{user_id}', [CustomerController::class, 'showCustomerDetails'])->name('customer-details');
Route::view('/admin/manage_reviews', 'admin_dashboard.manage_reviews')->name('manage_reviews');

Route::get('/admin/manage_reviews', [ReviewController::class, 'index'])->name('manage_reviews');
Route::get('/admin/manage_reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::post('/admin/manage_reviews/{id}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');


Route::delete('/admin/manage_reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');



//about 
Route::get('/about', function () {
    return view('about');
})->name('about');

//contac
Route::get('/contac', function () {
    return view('contac');
})->name('contac');


//contact form

Route::post('/contact-submit', function (Request $request) {
    // Form handling logic here (e.g., saving to database or sending email)
    // Example:
    // Mail::to('admin@example.com')->send(new ContactFormMail($request->all()));
    
    return back()->with('success', 'Thank you for contacting us!');
})->name('contact.submit');

//customer-inquiry
//about 
Route::get('/customer-inquiry', function () {
    return view('customer-inquiry');
})->name('customer-inquiry');







