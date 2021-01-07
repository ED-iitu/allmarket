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
Route::get('logout', 'HomeController@logout')->name('logout');
Route::post('sendSms', 'HomeController@sendSms')->name('sendSms');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/addToCart/{id}', 'HomeController@addToCart')->name('addToCart');
Route::post('addToFavorite', 'HomeController@addToFavorite')->name('addToFavorite');
Route::get('account/update', 'HomeController@updateUserData')->name('account-update');
Route::get('cart/deleteAll', 'HomeController@basketDelete')->name('deleteCart');
Route::get('cart/checkout', 'HomeController@checkout')->name('checkoutCart');
Route::post('cart/createOrder', 'HomeController@createUserOrder')->name('createOrder');
Route::post('order/repeat', 'HomeController@cloneOrder')->name('cloneOrder');
Route::get('shares', 'HomeController@shares')->name('shares');
Route::get('shares/{id}', 'HomeController@getSharesById')->name('share');
Route::post('city', 'HomeController@addCityToSession')->name('sessionCity');




