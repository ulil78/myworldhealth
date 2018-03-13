<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
<<<<<<< HEAD
|Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', 'Frontend\FrontController@beranda')->name('beranda');
Route::get('/search', 'Frontend\FrontController@search_result')->name('result');
Route::get('/detail', 'Frontend\FrontController@detail')->name('detail');
Route::get('/booked', 'Frontend\FrontController@booked')->name('booked');
Route::get('/getbooked', 'Frontend\FrontController@getbooked')->name('getbooked');
Route::get('/processbooked', 'Frontend\FrontController@processbooked')->name('processbooked');

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

        Route::resource('preferences', 'PreferenceController');
        Route::post('select-country', ['as'=>'select-country','uses'=>'AjaxController@selectCountry']);

        //hospitals
        Route::resource('hospitals', 'HospitalController');
        Route::post('add-image', 'HospitalController@postImage');
        Route::get('remove-image/{id}/{hospital}', 'HospitalController@getRemoveImage');
        Route::resource('hospital-departments', 'DepartmentController');
        Route::resource('hospital-programs', 'ProgramController');
        Route::resource('additional-services', 'ServiceController');


        //model general
        Route::resource('abouts', 'AboutController');
        Route::resource('contacts', 'ContactController');
        Route::resource('how-it-works', 'HowItWorkController');
        Route::resource('our-teams', 'OurTeamController');
        Route::resource('quality-standards', 'QualityStandardController');
        Route::resource('why-bookings', 'WhyBookingController');
        Route::resource('faqs', 'FaqController');

        //tools
        Route::resource('users', 'UserController');
        Route::resource('admins', 'AdministratorController');
        Route::resource('merchants', 'MerchantContoller');

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
