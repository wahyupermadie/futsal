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

Route::get('/','CustomerController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//ADMIN AUTH
Route::GET('customer/home','CustomerController@index');
Route::POST('login/customer','Customer\LoginController@login')->name('login.customer');
Route::GET('customer/form','Customer\LoginController@showLoginForm')->name('customer.loginForm');
Route::POST('logout','Customer\LoginController@logout')->name('customer.logout');
Route::POST('customer-password/email','Customer\ForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
Route::GET('customer-password/reset','Customer\ForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
Route::POST('customer-password/reset','Customer\ResetPasswordController@reset');
Route::GET('customer-password/reset/{token}','Customer\ResetPasswordController@showResetForm')->name('customer.password.reset');
Route::POST('register','Customer\RegisterController@register');
Route::GET('register','Customer\RegisterController@showRegistrationForm')->name('customer.register');

//FIELD DASHBOARD
Route::resource('lapangan','FieldController');

//SCHEDULE DASHBOARD
Route::GET('customer/schedule','ScheduleController@index');
Route::GET('jadwal/{id}/{day}','ScheduleController@viewScheduleByDay');
Route::GET('jadwal/{id}/{day}/create','ScheduleController@create');
Route::POST('jadwal/{id}/{day}/store','ScheduleController@store');
Route::POST('jadwal/{id}/{day}/copy','ScheduleController@copy');


//FIELD DASHBOARD
Route::GET('customer/field','FieldController@viewDashboard');
Route::resource('customer','FieldController');



//TRANSACTION DASHBOARD
Route::PUT('transaction/{id}/{type}','TransactionController@updateType');
Route::GET('transaction','TransactionController@index');
Route::GET('transaction/pending/{transaksi}','TransactionController@viewPending');
Route::GET('transaction/success/{transaksi}','TransactionController@viewSuccess');
Route::resource('transaction','TransactionController');

//REPORT DASHBOARD
route::GET('report/dashboard','ReportController@index');
route::GET('report','ReportController@showReport');
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