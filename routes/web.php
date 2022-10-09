<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register'=>false, 'login'=>false]);


// // Reset password
// Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');


// // Frontend Routes
// Route::get('/home', 'FrontendController@index');



// Route::post('/contact/message','MessageController@store')->name('contact.store');

// Route::post('/product/search','FrontendController@productSearch')->name('product.search');
// Route::get('/product-cat/{slug}','FrontendController@productCat')->name('product-cat');
// Route::get('/product-sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('product-sub-cat');
// Route::get('/product-brand/{slug}','FrontendController@productBrand')->name('product-brand');
// // Cart section
// Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart')->middleware('user');


// Route::post('cart-update','CartController@cartUpdate')->name('cart.update');

/* ***************************************
 *                                       *
 *            CUSTOMER SECTION           *
 *                                       *
 * ************************************* */

Route::group(['namespace' => 'Frontend', 'middleware' => 'cookie-consent'], function () {


        Route::get('/', 'HomeController@home')->name('home');

        // Socialite
        Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
        Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');

        // Auth Routes
        Route::get('login', 'UserController@login')->name('login');
        Route::post('login','UserController@loginSubmit')->name('login.submit');
        Route::get('register','UserController@register')->name('register');
        Route::post('register','UserController@registerSave')->name('register.submit');
        Route::get('logout','UserController@logout')->name('logout');
        Route::post('check-email', 'UserController@checkEmail')->name('check-email');

        // Reset Password Routes
        Route::get('forgot-password', 'UserController@forgotPassword')->name('forgot-password');
        Route::post('reset_password_with_token', 'UserController@resetPasswordToken')->name('reset_password_with_token');
        Route::get('password/reset/{token}', 'UserController@reset_password')->name('password-reset');
        Route::post('reset-password','UserController@resetPasswordSave')->name('reset-password');

//         // Email Verification
//         Route::get('verification/{token}', 'UserController@verifyEmail')->name('verify.confirmation');
//         Route::get('verify-success', 'UserController@verifySuccess')->name('verify.success');

        Route::get('/about-us', 'FrontendController@aboutUs')->name('about-us');
        Route::get('/contact-us', 'FrontendController@contactUs')->name('contact-us');
        Route::post('/conctact-submit', 'FrontendController@contactUsMsg')->name('contact.submit');

//         // Pages Routes
//         Route::get('/terms', 'PageController@terms')->name('terms');
//         Route::get('/privacy-policy', 'PageController@privacy_policy')->name('privacy-policy');
//         Route::get('/return-policy', 'PageController@return_policy')->name('return-policy');
//         Route::get('/shipping-guide', 'PageController@shipping_guide')->name('shipping-guide');
//         Route::get('/payment-methods', 'PageController@payment_methods')->name('payment-methods');
//         Route::get('/faq', 'PageController@faq')->name('faq');

        Route::get('buy', 'ProductController@buy')->name('buy');
        Route::get('sell', 'ProductController@sell')->name('sell');


//         Route::get('getAjaxProductQuickView/{id}', 'ProductController@getQuickView')->name('getQuickView');

//         // Cart Routes
//         Route::post('addToCart','CartController@addToCart')->name('add-to-cart');
//         Route::post('cart-delete','CartController@cartDelete')->name('cart-delete');
//         Route::post('cart-remove','CartController@cartRemove')->name('cart.remove');
//         Route::post('cart-getStates', 'CartController@getStates')->name('cart.getStates');
//         Route::post('updateCart', 'CartController@updateCart')->name('cart.update');
//         Route::post('updateCartTotal', 'CartController@updateCartTotal')->name('updateCartTotal');

//         // Coupon
//         Route::post('coupon-apply','CouponController@couponApply')->name('coupon.apply');
//         Route::post('coupon-remove','CouponController@couponRemove')->name('coupon.remove');

//         // Checkout
//         Route::post('checkout-submit','OrderController@store')->name('checkout.submit');

//         // Order Track
//         Route::get('/track-order','OrderController@orderTrack')->name('order.track');
//         Route::post('product/track/order','OrderController@productTrackOrder')->name('product.track.order');

//         // Product Routes
//         Route::get('/products','ProductController@products')->name('products');
//         Route::get('products/{slug}', 'ProductController@catProducts')->name('products.type');
//         Route::post('getRecommendSearch', 'ProductController@getRecommendSearch')->name('search.getRecommended');
//         Route::get('product-detail/{slug}', 'ProductController@productDetail')->name('product-detail');
//         Route::post('getPriceByQuantity', 'ProductController@getPriceByQuantity')->name('getPriceByQuantity');

//         // NewsLetter
//         Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');

        Route::middleware(['auth'])->group(function () {

//             // Wishlist Routes
//             Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
//             Route::post('addToWishlist', 'WishlistController@add_wishlist')->name('add-to-wishlist');
//             Route::post('wishlist-delete','WishlistController@wishlistDelete')->name('wishlist-delete');

//             Route::get('cart', 'CartController@index')->name('cart');
//             Route::get('checkout','CartController@checkout')->name('checkout');

//             // Profile
            Route::get('my-account', 'UserController@myAccount')->name('my-account');
//             Route::post('updateProfile', 'UserController@profileUpdate')->name('profile.update');
//             //Route::get('profile','HomeController@profile')->name('user-profile');
//             //Route::post('profile/{id}','HomeController@profileUpdate')->name('user-profile-update');

//             // Verification
//             Route::get('resend-verification-email', 'UserController@resendVerifyEmail')->name('verify.resend-email');

        });


});



// // Wishlist

// // Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');

// Route::post('cart/order','OrderController@store')->name('cart.order');
// Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
// Route::get('/income','OrderController@incomeChart')->name('product.order.income');
// // Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
// Route::get('/product-grids','FrontendController@productGrids')->name('product-grids');
// Route::get('/product-lists','FrontendController@productLists')->name('product-lists');
// Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');

// // Blog
// Route::get('/blog','FrontendController@blog')->name('blog');
// Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
// Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
// Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');
// Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
// Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');



// // Product Review
// Route::resource('/review','ProductReviewController');
// Route::post('product/{slug}/review','ProductReviewController@store')->name('review.store');

// // Post Comment
// Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
// Route::resource('/comment','PostCommentController');

// // Payment
// Route::get('payment', 'PaypalController@payment')->name('payment');
// Route::get('cancel', 'PaypalController@cancel')->name('payment.cancel');
// Route::get('payment/success', 'PaypalController@success')->name('payment.success');



// /* ***************************************
//  *                                       *
//  *            ADMIN SECTION              *
//  *                                       *
//  * ************************************* */

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

//     Route::get('/','AdminController@index')->name('admin');

//     Route::get('login', 'AdminController@login')->name('admin.login');
//     Route::post('login', 'AdminController@authenticate')->name('admin.login.submit');

//     Route::middleware(['admin'])->group(function () {
//         // Account Routes
//         Route::get('logout', 'AdminController@logout')->name('admin.logout');
//         Route::get('locale/{lang}', 'AdminController@switch_locale')->name('admin.locale');

//         // Dashboard Routes
//         Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

//         // User Routes
//         Route::get('user/index', 'UserController@index')->name('admin.user.index');
//         Route::get('user/detail/{id}', 'UserController@detail')->name('admin.user.detail');
//         Route::post('getUserData', 'UserController@getUserData')->name('admin.getUserData');
//         Route::post('user/import', 'UserController@userImport')->name('admin.user.import');
//         Route::post('user/delete', 'UserController@userDelete')->name('admin.user.delete');
//         Route::post('user/update', 'UserController@userUpdate')->name('admin.user.update');
//         Route::post('user/updatePhone', 'UserController@userUpdatePhone')->name('admin.user.update-phone');

//         // Category Routes
//         Route::get('category/index','CategoryController@index')->name('admin.category.index');
//         Route::get('category/add','CategoryController@add')->name('admin.category.add');
//         Route::post('category/store', 'CategoryController@store')->name('admin.category.store');
//         Route::post('category/delete', 'CategoryController@delete')->name('admin.category.delete');
//         Route::get('category/detail/{id}', 'CategoryController@edit')->name('admin.category.detail');
//         Route::post('category/update', 'CategoryController@update')->name('admin.category.update');

//         // Product Routes
//         Route::get('product/index', 'ProductController@index')->name('admin.product.index');
//         Route::get('product/detail/{id}', 'ProductController@detail')->name('admin.product.detail');
//         Route::get('product/add', 'ProductController@add')->name('admin.product.add');
//         Route::post('product/store', 'ProductController@store')->name('admin.product.store');
//         Route::post('product/update', 'ProductController@update')->name('admin.product.update');
//         Route::post('product/addProductImages', 'ProductController@addProductImages')->name('admin.product.addProductImages');
//         Route::post('product/getProductImages', 'ProductController@getProductImages')->name('admin.product.getProductImages');
//         Route::post('product/removeProductImages', 'ProductController@removeProductImages')->name('admin.product.removeProductImages');
//         Route::post('product/delete', 'ProductController@productDelete')->name('admin.product.delete');
//         Route::post('product/import', 'ProductController@productImport')->name('admin.product.import');

//         // Brand Routes
//         Route::get('brand/index','BrandController@index')->name('admin.brand.index');
//         Route::get('brand/add', 'BrandController@add')->name('admin.brand.add');
//         Route::post('brand/store', 'BrandController@store')->name('admin.brand.store');
//         Route::get('brand/detail/{id}', 'BrandController@edit')->name('admin.brand.detail');
//         Route::post('brand/update', 'BrandController@update')->name('admin.brand.update');
//         Route::post('brand/delete', 'BrandController@delete')->name('admin.brand.delete');

//         // Orders Routes
//         Route::get('order/index','OrderController@index')->name('admin.order.index');
//         Route::get('order/detail/{id}','OrderController@detail')->name('admin.order.detail');
//         Route::post('order/delete', 'OrderController@orderDelete')->name('admin.order.delete');
//         Route::post('order/updateStatus', 'OrderController@orderUpdateStatus')->name('admin.order.updateStatus');

//         // Delivery Routes
//         Route::get('delivery/index', 'OrderController@deliveryIndex')->name('admin.delivery.index');
//         Route::get('delivery/detail/{id}', 'OrderController@deliveryDetail')->name('admin.delivery.detail');
//         Route::post('delivery/delete', 'OrderController@deliveryDelete')->name('admin.delivery.delete');

//         // Banners Routes
//         Route::get('website/banners/index', 'WebsiteController@bannerIndex')->name('admin.banner.index');
//         Route::get('website/banners/add', 'WebsiteController@bannerAdd')->name('admin.banner.add');
//         Route::post('website/banners/store', 'WebsiteController@bannerSave')->name('admin.banner.save');
//         Route::get('website/banners/detail/{id}', 'WebsiteController@bannerDetail')->name('admin.banner.detail');
//         Route::post('website/banners/update', 'WebsiteController@bannerUpdate')->name('admin.banner.update');
//         Route::post('website/banners/delete', 'WebsiteController@bannerDelete')->name('admin.banner.delete');

//         // Partners Routes
//         Route::get('website/partners/index', 'WebsiteController@partnerIndex')->name('admin.partner.index');
//         Route::post('website/partners/store', 'WebsiteController@partnerSave')->name('admin.partner.save');
//         Route::post('website/partners/delete', 'WebsiteController@partnerDelete')->name('admin.partner.delete');
//         Route::post('website/partners/get', 'WebsiteController@partnerGet')->name('admin.partner.get');
//         Route::post('website/partners/update', 'WebsiteController@partnerUpdate')->name('admin.partner.update');

//         // Utility Routes
//         Route::post('getStateData', 'UtilityController@getStateData')->name('admin.getStateData');


//     });
// });

// Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){

//     Route::get('/file-manager',function(){
//         return view('backend.layouts.file-manager');
//     })->name('file-manager');
//     // user route
//     Route::resource('users','UsersController');
//     // Banner
//     Route::resource('banner','BannerController');
//     // Brand

//     // Profile
//     Route::get('/profile','AdminController@profile')->name('admin-profile');
//     Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
//     // Category

//     // Ajax for sub category
//     Route::post('/category/{id}/child','CategoryController@getChildByParent');
//     // POST category
//     Route::resource('/post-category','PostCategoryController');
//     // Post tag
//     Route::resource('/post-tag','PostTagController');
//     // Post
//     Route::resource('/post','PostController');
//     // Message
//     Route::resource('/message','MessageController');
//     Route::get('/message/five','MessageController@messageFive')->name('messages.five');

//     // Order

//     // Shipping
//     Route::resource('/shipping','ShippingController');
//     // Coupon
//     Route::resource('/coupon','CouponController');
//     // Settings
//     Route::get('settings','AdminController@settings')->name('settings');
//     Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

//     // Notification
//     Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
//     Route::get('/notifications','NotificationController@index')->name('all.notification');
//     Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
//     // Password Change
//     Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
//     Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
// });










// // User section start
// Route::group(['prefix'=>'/user','middleware'=>['user']],function(){

//     Route::get('/','HomeController@index')->name('user');



//     //  Order
//     Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
//     Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
//     Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');

//     // Product Review
//     Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
//     Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
//     Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
//     Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');

//     // Post comment
//     Route::get('user-post/comment','HomeController@userComment')->name('user.post-comment.index');
//     Route::delete('user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
//     Route::get('user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
//     Route::patch('user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');

//     // Password Change
//     Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
//     Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');
// });

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });