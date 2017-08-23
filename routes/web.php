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
Route::POST('jadwal/{id}/{day}/copy','ScheduleController@copy');


//FIELD DASHBOARD
Route::GET('customer/field','FieldController@viewDashboard');
Route::resource('customer','FieldController');



//TRANSACTION DASHBOARD
Route::GET('customer/transaction','TransactionController@index');
Route::GET('customer/booking/pending/{id}/{transaksi}','TransactionController@viewPending');
Route::GET('customer/booking/success/{id}','TransactionController@viewSuccess');
Route::resource('booking/konfirmasi','TransactionController');

//API
Route::get('/api','ApiController@index');
Route::get('/api/{customer}/field','ApiController@field');
Route::get('/api/form',function(){
	return view('form_api');
});
Route::get('/api/schedule/{id}',function($id){
  echo "<form form action='".url('api/schedule/'.$id)."' method='post'>";
  echo "<input type='date' name='date' require/>";
  echo "<button type='submit'>Lihat Jadwal</button>";
  echo "</form>";
});
Route::get('/api/schedule/{id}/{date}','ApiController@viewSchedule');

Route::post('/api/insert','ApiController@insert');
Route::post('/api/booking','ApiController@booking');
Route::get('/api/booking',function(){
  echo "<form form action='".url('api/booking/')."' method='post'>";
  echo "<input type='text' name='user_id' value='1'/>";
  echo "<input type='text' name='played_at' value='2017-07-25'/>";
  echo "<input type='text' name='schedule_id' value='252'/>";
  echo "<button type='submit'>Lihat Jadwal</button>";
  echo "</form>";
});
Route::post('api/login/','ApiController@login');
Route::post('api/register/','ApiController@register');
Route::get('api/register/',function(){
  echo "<form form action='".url('api/register/')."' method='post'>";
  echo "<input type='text' name='name' placeholder='Nama'/>";
  echo "<input type='text' name='email' placeholder='email'/>";
  echo "<input type='text' name='password' placeholder='password'/>";
  echo "<button type='submit'>Lihat Jadwal</button>";
  echo "</form>";
});
