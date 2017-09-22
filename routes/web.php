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

// Route::get('/','CustomerController@index');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
//CUSTOMER
Route::GET('/profile','CustomerController@profile');
//ADMIN AUTH
Route::GET('/home','CustomerController@index');
Route::POST('login/customer','Customer\LoginController@login')->name('login.customer');
Route::GET('/','Customer\LoginController@showLoginForm')->name('customer.loginForm');
Route::POST('logout','Customer\LoginController@logout')->name('customer.logout');
Route::POST('customer-password/email','Customer\ForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
Route::GET('customer-password/reset','Customer\ForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
Route::POST('customer-password/reset','Customer\ResetPasswordController@reset');
Route::GET('customer-password/reset/{token}','Customer\ResetPasswordController@showResetForm')->name('customer.password.reset');
Route::POST('register_customer','Customer\RegisterController@register')->name('customer.register');
Route::GET('registerform','Customer\RegisterController@showRegistrationForm')->name('customer.registerForm');

//FIELD DASHBOARD
Route::resource('field','FieldController');

//SCHEDULE DASHBOARD
Route::GET('/schedule','ScheduleController@index');
Route::GET('schedule/{id}/{day}','ScheduleController@viewScheduleByDay');
Route::GET('schedule/{id}/{day}/create','ScheduleController@create');
Route::POST('schedule/{id}/{day}/store','ScheduleController@store');
Route::POST('schedule/{id}/{day}/copy','ScheduleController@copy');


//FIELD DASHBOARD
Route::GET('/field','FieldController@viewDashboard');
Route::GET('field/{field}/edit', 'FieldController@edit')->middleware('can:view,field');
Route::resource('customer','FieldController');



//TRANSACTION DASHBOARD
Route::PUT('transaction/{id}/{type}','TransactionController@updateType');
Route::GET('transaction','TransactionController@index');
Route::GET('transaction/pending/{transaksi}','TransactionController@viewPending');
Route::GET('transaction/success/{transaksi}','TransactionController@viewSuccess');
Route::GET('transaction/user/{transaksi}','TransactionController@viewUser');
Route::resource('transaction','TransactionController');

//REPORT DASHBOARD
route::GET('/report','ReportController@index');
route::GET('report/chart','ReportController@chart');
route::GET('report/show','ReportController@showReport');
route::GET('report/detail/{date}','ReportController@showDetail');

//API
Route::prefix('/api')->group(function(){
  Route::get('/customer','ApiController@index');
  Route::get('/{customer}/field','ApiController@field');
  Route::get('/schedule/{id}/{date}','ApiController@viewSchedule');
  Route::post('/insert','ApiController@insert');
  Route::post('/booking','ApiController@booking');
  Route::post('login/','ApiController@login');
  Route::post('register/','ApiController@register');
  Route::get('user/','ApiController@user');
  Route::get('progressTransaction/','ApiController@progressTransaction');
  Route::get('historyTransaction/','ApiController@historyTransaction');
  Route::post('edituser/','ApiController@edituser');
  Route::post('cancelingbook/','ApiController@cancelingbook');
});