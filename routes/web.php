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

Route::get('/', '\Aimeos\Shop\Controller\CatalogController@homeAction')->name('aimeos_home');
Route::get('my-notification', 'HomeController@myNotification');

Route::get('/termsofuse', function () {
		return view('terms');
	});
	
Route::get('/privacyterms', function () {
	return view('privacy');
});

Route::get('/pay-kulipa', function () {
	return view('pay');
});

Route::get('contact-us', 'ContactController@getContact');
Route::post('contact-us', 'ContactController@saveContact');
Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::get('/pay', 'HomeController@myNotification');
Route::post('/rave/callback', 'RaveController@callback')->name('callback');
Route::get('/rave/callback', 'RaveController@callback')->name('callback');
Route::post('/receivepayment', 'RaveController@webhook')->name('webhook');
Route::get('success', 'HomeController@success');
