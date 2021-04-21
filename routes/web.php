<?php

use App\Contact;
use App\Payment;
use App\PersonalLink;
use App\Text;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
Route::get('/loading', 'HomeController@loading')->name('loading');
Route::get('/offers', 'HomeController@offers')->name('offers');
Route::get('/unNewsletters', 'HomeController@unNewsletters')->name('unNewsletters');
Route::get('/unSubscribe', 'HomeController@unSubscribe')->name('unSubscribe');

Route::get('/tinkoff', 'PaymentController@link');
Route::get('/cancel/{id}', 'PaymentController@cancel');
Route::any('/status', 'PaymentController@status')->name('status');

Route::post('/savedata', 'HomeController@saveData')->name('save.data');
Route::get('/firstpaid/{id}', 'YandexController@firstPayment')->name('first.paid');
Route::any('/notification', 'YandexController@paymentNotification')->name('notification.paid');


Route::get('/{ref}/{id}', 'PersonalLinkController@linkOpened')->name('link.opened');

Route::get('/test', function () {
    $p = Contact::where('id', 1536)->first();
    dd($p->phone[1] == '7');
});

Route::any('/{any}', "HomeController@index")->where('any', '.*')->name('any');
