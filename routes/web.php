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
Route::get('/home', 'HomeController@index')->name('home');

//ADMIN AUTH
Route::GET('customer/home','CustomerController@index');
Route::POST('customer','Customer\LoginController@login')->name('customer.login');
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


//FIELD DASHBOARD
Route::GET('customer/field','FieldController@viewDashboard');



//TRANSACTION DASHBOARD
Route::GET('customer/transaction','TransactionController@index');
