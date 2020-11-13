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
Route::get('/about', 'HomeController@about')->name('about');
Route::get('faq', 'HomeController@faq')->name('faq');
Route::get('sections', 'HomeController@sections')->name('sections');
Route::get('section/{id}', 'HomeController@getSectionById')->name('sectionById');
Route::get('/product/{id}', 'HomeController@product')->name('product');
Route::get('section/{section_id}/category/{category_id}', 'HomeController@getProductsByCategoryId')->name('category_products');
Route::post('registration', 'HomeController@registration')->name('registration');
Route::get('account', 'HomeController@account')->name('account');



