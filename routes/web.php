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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/callBack', 'HomeController@callBack')->name('callBack');
Route::get('/loan', 'HomeController@loan')->name('loan');
Route::get('/offers', 'HomeController@offers')->name('offers');
Route::get('/unNewsletters', 'HomeController@unNewsletters')->name('unNewsletters');
Route::get('/unSubscribe', 'HomeController@unSubscribe')->name('unSubscribe');

Route::get('/tinkoff', 'PaymentController@link');
Route::get('/cancel/{id}', 'PaymentController@cancel');
Route::any('/status', 'PaymentController@status')->name('status');

Route::post('/savedata', 'HomeController@saveData')->name('save.data');
Route::get('/firstpaid/{id}', 'YandexController@firstPayment')->name('first.paid');
Route::get('/notification', 'YandexController@paymentNotification')->name('notification.paid');


Route::any('/{any}', "HomeController@index")->where('any', '.*')->name('any');
