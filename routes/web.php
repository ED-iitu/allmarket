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

Route::get('/', 'HomeController@index')->name('home');
Route::get('sale', 'HomeController@sale')->name('sale');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('faq', 'HomeController@faq')->name('faq');
Route::get('sections', 'HomeController@sections')->name('sections');
Route::get('section/{id}', 'HomeController@getSectionById')->name('sectionById');
Route::get('/product/{id}', 'HomeController@product')->name('product');
Route::get('section/{section_id}/category/{category_id}', 'HomeController@getProductsByCategoryId')->name('category_products');
Route::post('registration', 'HomeController@registration')->name('registration');
Route::post('/login', 'HomeController@login')->name('login');
Route::get('account', 'HomeController@account')->name('account');
Route::get('/account/favorite', 'AccountController@favorite')->name('accountFavorite');
Route::get('/account/my-orders', 'AccountController@orders')->name('accountOrders');
Route::get('/account/profile', 'AccountController@profile')->name('accountProfile');
Route::get('/account/orders', 'HomeController@getAccountOrderById')->name('accountOrdersById');
Route::get('logout', 'HomeController@logout')->name('logout');
Route::post('sendSms', 'HomeController@sendSms')->name('sendSms');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/addToCart/{id}', 'HomeController@addToCart')->name('addToCart');
Route::post('/addToCart', 'HomeController@addToCart')->name('addToCartPost');
Route::post('/addToCartSale', 'HomeController@addToCartSale')->name('addToCartPostSale');
Route::post('/removeToCart', 'HomeController@removeToCart')->name('removeToCartPost');
Route::get('/update-cart', 'HomeController@update_cart')->name('update_cart');
Route::get('/update-cart-data', 'HomeController@update_cart_data')->name('update_cart_data');
Route::get('/cart/remove/{id}/{qty}', 'HomeController@remove_to_cart')->name('remove_to_cart');
Route::post('addToFavorite', 'HomeController@addToFavorite')->name('addToFavorite');
Route::get('account/update', 'HomeController@updateUserData')->name('account-update');
Route::get('cart/deleteAll', 'HomeController@basketDelete')->name('deleteCart');
Route::get('cart/checkout', 'HomeController@checkout')->name('checkoutCart');
Route::post('cart/createOrder', 'HomeController@createUserOrder')->name('createOrder');
Route::post('order/repeat', 'HomeController@duplicate_order')->name('duplicate_order');
Route::get('shares', 'HomeController@shares')->name('shares');
Route::get('shares/{id}', 'HomeController@getSharesById')->name('share');
Route::post('city', 'HomeController@addCityToSession')->name('sessionCity');
Route::get('available-cities', 'HomeController@getAvailableCities')->name('availableCities');
Route::post('addRaiting', 'HomeController@addRaiting')->name('addRaiting');
Route::get('select-city/{id}/{title}', 'HomeController@selectCity')->name('selectCity');
Route::get('/addReview', 'HomeController@addReview')->name('addReview');
Route::get('/promo-code/check', 'HomeController@checkPromoCode')->name('checkPromoCode');


