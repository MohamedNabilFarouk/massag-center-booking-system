<?php

use App\Http\Controllers\Dashboard\AdsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductDetails;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\CustomersController;

//dd("Hossam");

URL::forceRootUrl("https://spa.alefsoftware.com");
    URL::forceScheme('https');
// URL::forceRootUrl("http://localhost/massage/public");
// URL::forceRootUrl("http://localhost:8000");

    Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {


Route::group(['prefix' => 'admin'], function() {
       $middleware = [];
         Route::get('/', function(){
             return redirect('/admin/dashboard');
            })->name('admin.dashboard');
    AdvancedRoute::controller('auth', 'App\Http\Controllers\Admin\AdminAuthController');
    AdvancedRoute::controller('dashboard', 'App\Http\Controllers\Admin\Home');
    AdvancedRoute::controller('admins', 'App\Http\Controllers\Admin\Admins');

    AdvancedRoute::controller('contacts', 'App\Http\Controllers\Admin\Contacts');
    AdvancedRoute::controller('news', 'App\Http\Controllers\Admin\News');
    AdvancedRoute::controller('pages', 'App\Http\Controllers\Admin\Pages');
    AdvancedRoute::controller('paragraphs', 'App\Http\Controllers\Admin\Paragraphs');
    AdvancedRoute::controller('slides', 'App\Http\Controllers\Admin\Slides');
    AdvancedRoute::controller('subscribers', 'App\Http\Controllers\Admin\Subscribers');
    AdvancedRoute::controller('configs', 'App\Http\Controllers\Admin\Configs');
    AdvancedRoute::controller('images', 'App\Http\Controllers\Admin\Images');

    AdvancedRoute::controller('price_plans', 'App\Http\Controllers\Admin\PlansController');

    AdvancedRoute::controller('roles', 'App\Http\Controllers\Admin\RolesController');
    AdvancedRoute::controller('ads', 'App\Http\Controllers\Admin\AdsController');
	AdvancedRoute::controller('categories', 'App\Http\Controllers\Admin\CategoriesController');
	AdvancedRoute::controller('orders', 'App\Http\Controllers\Admin\OrdersController');
	AdvancedRoute::controller('sub-categories', 'App\Http\Controllers\Admin\SubCategoriesController');
	AdvancedRoute::controller('customers', 'App\Http\Controllers\Admin\CustomersController');


/* Site Settings Routes */
Route::get('site_settings', 'App\Http\Controllers\Admin\SiteSettingController@generalShow')->name('settings.site.show');
Route::put('site_settings', 'App\Http\Controllers\Admin\SiteSettingController@generalUpdate')->name('settings.site.update');

Route::get('social_settings', 'App\Http\Controllers\Admin\SiteSettingController@socialShow')->name('settings.social.show');
Route::put('social_settings', 'App\Http\Controllers\Admin\SiteSettingController@socialUpdate')->name('settings.social.update');
Route::resource('Bestprices','App\Http\Controllers\Admin\PricesController');
Route::resource('Reviews','App\Http\Controllers\Admin\ReviewController');
Route::resource('Services','App\Http\Controllers\Admin\ServiceController');
Route::resource('Packages','App\Http\Controllers\Admin\PackageController');
Route::resource('team','App\Http\Controllers\Admin\TeamController');
Route::resource('Products','App\Http\Controllers\Admin\ProductsController');
Route::resource('booking','App\Http\Controllers\Admin\BookingController');
Route::get('details/{id}','App\Http\Controllers\Admin\BookingController@show')->name('details');

// Route::get('details/{id}/{notifi_id?}','App\Http\Controllers\Admin\BookingController@show')->name('details');
Route::get('read/{id}','App\Http\Controllers\Admin\BookingController@read')->name('read');
Route::get('booking-filter','App\Http\Controllers\Admin\BookingController@filter')->name('booking.filter');
Route::resource('orders','App\Http\Controllers\Admin\OrderController');
// admin update booking
Route::get('/editPackageBooking/{id}','\App\Http\Controllers\Admin\BookingController@editBooking')->name('admin.booking.update');
Route::put('/UpdatePackageBooking/{id}','\App\Http\Controllers\Admin\BookingController@updateBooking')->name('admin.doBooking.update');


Route::put('/UpdateStatus/{id}','\App\Http\Controllers\Admin\BookingController@update')->name('booking.updateStatus');
// end admin update booking

Route::get('/mark-as-read/{id}', 'App\Http\Controllers\Admin\Home@markNotification')->name('markNotification');
// export excel
Route::get('/exportUsers', 'App\Http\Controllers\Admin\Users@exportUsers')->name('user.export');
Route::get('/exportBookings', 'App\Http\Controllers\Admin\BookingController@exportBookings')->name('booking.export');
Route::get('/exportOrders', 'App\Http\Controllers\Admin\OrderController@exportOrders')->name('order.export');


});



Route::get('hotelRules',function(){
    return view('admin.rules.edit');
});
});


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

Route::group(['middleware' => 'guest'], function() {

    Auth::routes();
    Route::post('login_user', '\App\Http\Controllers\Auth\LoginController@login')->name('do.login');
    Route::get('/CreateAccount', function(){
        return view('site.loginRegister');
    })->name('createAccount');

    Route::get('login/{provider}', '\App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('social.login');
    Route::get('login/{provider}/callback', '\App\Http\Controllers\Auth\LoginController@handleProviderCallback');

});
Route::group(['middleware' => ['auth', 'web']], function() {
    Route::post('ChangePassword', '\App\Http\Controllers\ProfileController@changePassword')->name('change.password');
    Route::post('profileUpdate', '\App\Http\Controllers\ProfileController@profileUpdate')->name('profile.update');
    Route::get('cancelBooking/{id}', '\App\Http\Controllers\ProfileController@cancelBooking')->name('profile.cancelBooking');
    Route::post('addreview', '\App\Http\Controllers\ReviewController@store')->name('add.review');
    Route::get('/profile', function(){
        return view('site.profile');
    })->name('site.profile');
Route::get('/product/checkout/{slug}', 'App\Http\Controllers\ProductController@getCheckout')->name('get.checkout');

    Route::post('/product/order', 'App\Http\Controllers\ProductController@placeOrder')->name('add.order');

    // for  package page
Route::get('/packageBooking/{slug}','\App\Http\Controllers\PackageController@getPackageBooking')->name('package.getPackageBooking');
// for navbar
Route::get('/packageBooking/AllPackages','\App\Http\Controllers\PackageController@getAllPackageBooking')->name('package.getAllPackageBooking');
Route::post('/doBooking/','\App\Http\Controllers\PackageController@booking')->name('package.doBooking');

// site edit booking
Route::get('/editBooking/{id}','\App\Http\Controllers\PackageController@editBooking')->name('site.booking.update');
Route::put('/updateBooking/{id}','\App\Http\Controllers\PackageController@updateBooking')->name('site.dobooking.update');


// Route::get('packageBooking/profTime/{id}/{date}/{package_id}/{special_prof_id}','\App\Http\Controllers\PackageController@getAvailableTeamAjax')->name('get.profTimes');



});


// ajax prof availability

Route::get('packageBooking/profTime/{id}/{date}/{package_id}','\App\Http\Controllers\PackageController@getAvailableTeamAjax')->name('get.profTimes');
Route::get('packageBooking/SpecialprofTime/{special_prof_id}/{date}/{PACKAGE?}/{TIME?}','\App\Http\Controllers\PackageController@getAvailableSpecialTeamAjax')->name('get.specialProfTimes');


Route::get('/daftara','\App\Http\Controllers\PackageController@daftara')->name('daftara');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/about','App\Http\Controllers\SiteController@about');
Route::get('/rules', function(){
    return view('site.rules');
});
// Route::get('/news', function(){
//     return view('site.news');
// });

Route::get('/our-reviews', 'App\Http\Controllers\SiteController@getOurReviews');
Route::get('/services','\App\Http\Controllers\SiteController@getServices');
Route::get('/packages','\App\Http\Controllers\SiteController@getPackages');

Route::get('/news','\App\Http\Controllers\SiteController@getAllNews');
Route::get('/news/{slug}','\App\Http\Controllers\SiteController@getNews')->name('newsDetails');




Route::get('/', 'App\Http\Controllers\SiteController@getHomePage')->name('get.homepage');
Route::get('/contact', 'App\Http\Controllers\SiteController@contact')->name('get.contact');
Route::get('/Product/{slug}', 'App\Http\Controllers\SiteController@productDetails')->name('get.product.details');
Route::get('/service/{id}', 'App\Http\Controllers\SiteController@serviceDetails')->name('get.service.details');
Route::get('/Shop', 'App\Http\Controllers\SiteController@shop')->name('get.shop');
Route::get('/search', 'App\Http\Controllers\ProductController@shopSearch')->name('do.search');

// Route::get('/payment', 'App\Http\Controllers\PaymentController@pay');
Route::get('/charts', 'App\Http\Controllers\dashboardController@charts');

Route::post('sendMessage','App\Http\Controllers\SiteController@set_contactus')->name('send.contact');
Route::post('subscribe','App\Http\Controllers\SiteController@addSubscriber')->name('add.subscriber');



});

