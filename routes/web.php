<?php

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
Route::get('/', 'FrontController@beranda')->name('beranda');
Route::get('/search', 'FrontController@search_result')->name('result');
Route::get('/detail', 'FrontController@detail')->name('detail');
Route::get('/booked', 'FrontController@booked')->name('booked');
Route::get('/getbooked', 'FrontController@getbooked')->name('getbooked');
Route::get('/processbooked', 'FrontController@processbooked')->name('processbooked');
// Route::get('/home', 'HomeController@index')->name('home');
