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
// Pages
Route::get('/about', 'Frontend\FrontController@about')->name('about');
Route::get('/why-myworldhealth', 'Frontend\FrontController@why_mwh')->name('why-mwh');
Route::get('/question-answer', 'Frontend\FrontController@question_answer')->name('q-a');
Route::get('/contact', 'Frontend\FrontController@contact')->name('contact');

// Function
Route::get('/search', 'Frontend\FrontController@search_result')->name('result');
Route::get('/detail', 'Frontend\FrontController@detail')->name('detail');
Route::get('/booked', 'Frontend\FrontController@booked')->name('booked');
Route::get('/getbooked', 'Frontend\FrontController@getbooked')->name('getbooked');
Route::get('/processbooked', 'Frontend\FrontController@processbooked')->name('processbooked');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('sendmail', 'SendMailController@sendMail');

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

        //bookings
        Route::resource('invoices', 'InvoiceBackendController');
        Route::get('invoice/{status}', 'InvoiceBackendController@getStatus');

        //payment-merchants
        Route::resource('payment-merchants', 'PaymentMerchatBackendController');
        Route::get('payment/{status}', 'PaymentMerchatBackendController@getStatus');




        //Promo
        Route::resource('banners', 'BannerController');
        Route::resource('sliders', 'SliderController');
        Route::resource('vouchers', 'VoucherController');
        Route::resource('discounts', 'DiscountController');
        Route::post('add-program', 'DiscountController@postProgram');
        Route::get('remove-program/{id}/{program}', 'DiscountController@getRemoveProgram');

        //hospitals
        Route::resource('hospitals', 'HospitalController');
        Route::post('add-image', 'HospitalController@postImage');
        Route::get('remove-image/{id}/{hospital}', 'HospitalController@getRemoveImage');
        Route::resource('hospital-departments', 'DepartmentController');
        Route::resource('hospital-programs', 'ProgramController');
        Route::resource('additional-services', 'ServiceController');

        Route::resource('transfer-arrivals', 'TransferArrivalController');
        Route::resource('transfer-arrival-types', 'TransferArrivalTypeController');
        Route::resource('transfer-return', 'TransferReturnController');
        Route::resource('transfer-return-types', 'TransferReturnTypeController');


        //model general
        Route::resource('abouts', 'AboutController');
        Route::resource('contacts', 'ContactController');
        Route::resource('how-it-works', 'HowItWorkController');
        Route::resource('our-teams', 'OurTeamController');
        Route::resource('quality-standards', 'QualityStandardController');
        Route::resource('why-bookings', 'WhyBookingController');
        Route::resource('faqs', 'FaqController');

        //Patients
        Route::resource('patients', 'PatientController');
        Route::resource('patient-transactions', 'PatientTransactionController');

        //tools
        Route::resource('users', 'UserController');
        Route::resource('admins', 'AdministratorController');
        Route::resource('merchants', 'MerchantAdmController');

        //message
        Route::resource('messages', 'MessageController');

    });
});


Route::prefix('merchant')->group(function() {
    Route::get('/login', 'Auth\MerchantLoginController@showLoginForm')->name('merchant.login');
    Route::post('/login', 'Auth\MerchantLoginController@login')->name('merchant.login.submit');
    Route::post('/logout', 'Auth\MerchantLoginController@logout');

    Route::group(['namespace' => 'Merchant', 'middleware' => 'merchant'], function (){

        //Route For Merchant Hire
        Route::get('/', 'MerchantController@index')->name('merchant.dashboard');

        //ProgramSetup

        Route::resource('hospitals', 'HospitalMerchantController');
        Route::post('add-image', 'HospitalMerchantController@postImage');
        Route::get('remove-image/{id}/{hospital}', 'HospitalMerchantController@getRemoveImage');
        Route::resource('hospital-departments', 'HospitalDepartmentController');
        Route::resource('hospital-programs', 'HospitalProgramController');
        Route::resource('additional-services', 'AdditionalServiceController');

        Route::resource('transfer-arrivals', 'MerchantTransferArrivalController');
        Route::resource('transfer-arrival-types', 'MerchantTransferArrivalTypeController');
        Route::resource('transfer-returns', 'MerchantTransferReturnController');
        Route::resource('transfer-return-types', 'MerchantTransferReturnTypeController');

        Route::post('select-department', ['as'=>'select-department','uses'=>'MerchantAjaxController@selectDepartment']);

        Route::post('select-department-arrival', ['as'=>'select-department-arrival','uses'=>'MerchantAjaxController@selectDepartmentArrival']);
        Route::post('select-program-arrival', ['as'=>'select-program-arrival','uses'=>'MerchantAjaxController@selectProgramArrival']);

        Route::post('select-department-return', ['as'=>'select-department-return','uses'=>'MerchantAjaxController@selectDepartmentReturn']);
        Route::post('select-program-return', ['as'=>'select-program-return','uses'=>'MerchantAjaxController@selectProgramReturn']);



    });
});
