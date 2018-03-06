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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Route for Frontend hire

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout');

    Route::group(['namespace' => 'Backend', 'middleware' => 'admin'], function (){

        //Route for Backend Hire

        Route::get('/', 'AdminController@index')->name('admin.dashboard');

        //Categories
        Route::resource('first-categories', 'FirstCategoryController');
        Route::resource('second-categories', 'SecondCategoryController');
        Route::resource('thrid-categories', 'ThridCategoryController');
        Route::resource('fourth-categories', 'FourthCategoryController');

        Route::post('select-first-cat', ['as'=>'select-first-cat','uses'=>'AjaxController@selectFirstCat']);
        Route::post('select-second-cat', ['as'=>'select-second-cat','uses'=>'AjaxController@selectSecondCat']);

        //location
        Route::resource('countries', 'CountryController');
        Route::resource('cities', 'CityController');


    });
});


Route::prefix('merchant')->group(function() {
    Route::get('/login', 'Auth\MerchantLoginController@showLoginForm')->name('merchant.login');
    Route::post('/login', 'Auth\MerchantLoginController@login')->name('merchant.login.submit');

    Route::group(['namespace' => 'Merchant', 'middleware' => 'merchant'], function (){

        //Route For Merchant Hire
        Route::get('/', 'MerchantController@index')->name('merchant.dashboard');


    });
});
