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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


/* Apps */

Route::get('apps/create','ApplicationController@create')->name('create_app')->middleware('developer');
Route::get('apps/search','ApplicationController@search')->name('search_app');
Route::get('apps','ApplicationController@index')->name('apps');
Route::get('apps/{app}','ApplicationController@show')->name('show_app');

Route::post('api/buy/{app}','ApplicationController@buy')->name('buy_app')->middleware('auth');
Route::post('api/wish/{app}','ApplicationController@wish')->name('wish_app')->middleware('auth');
Route::delete('api/buy/{app}','ApplicationController@cancel_buy')->name('cancel_buy')->middleware('auth');
Route::delete('api/wish/{app}','ApplicationController@cancel_wish')->name('cancel_wish')->middleware('auth');


/* Client */

Route::get('user/apps/client', 'UserController@my_apps')->name('client_apps');
Route::get('user/apps/status','UserController@buyed_app')->name('buyed_apps');

/* Developer */

Route::get('user/apps/developer','UserController@crafted_apps')->name('developer_apps')->middleware('developer');
Route::post('apps/store','ApplicationController@store')->name('store_app')->middleware('developer');
Route::get('apps/{app}/edit','ApplicationController@edit')->name('edit_app')->middleware('developer');
Route::get('apps/edit/{app}','ApplicationController@edit')->name('edit_app')->middleware('developer');
Route::put('apps/update/{app}','ApplicationController@update')->name('update_app')->middleware('developer');
Route::get('apps/disable/{app}','ApplicationController@destroy')->name('disable_app')->middleware('developer');

/* Categories */
Route::get('category/create','CategoryController@create')->name('create_category')->middleware('developer');
Route::get('category/{category}','CategoryController@show')->name('show_category');
Route::post('category/store','CategoryController@store')->name('store_category')->middleware('developer');