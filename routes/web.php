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
Route::group(['domain' => 'admin.laravel.com', 'middleware' => 'checkAdmin'], function() {
    Route::get('/', 'AdminController@index');

});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/order', 'OrderController@index');
Route::post('store_order','OrderController@store');
Route::get('store_order','OrderController@store');

Route::get('/user/home', 'UserController@index');
Route::get('/user/orders/unpaid', 'UserController@all_unpaid');


Route::post('/user/pay/{slug}','PaypalController@payWithPaypal');
Route::get('/user/pay/{slug}','PaypalController@payWithPaypal');
Route::Post('order/charge','PaypalController@paypalSmartButtons');

Route::get('/solutionsbay','WriterController@index')->middleware('checkWriter');
//Route::get('/solutionsbay/view/{id}','WriterController@view_order')->middleware('checkWriter');

Route::get('/solutionsbay/view/readybids','WriterController@orders_to_bid')->name('all_biddable_orders')->middleware('checkWriter');
Route::get('/solutionsbay/view/readybids/{id}','WriterController@bid_order')->name('bid_order')->middleware('checkWriter');
Route::get('/downloadFile/{file}','WriterController@downloadFile')->name('download_order_file');


Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');



Route::post('createorder', array('as' => 'paypal.createorder','uses' => 'PaypalController@postPaymentWithpaypal'));
Route::post('captureorder/{orderId}/capture', array('as' => 'paypal.captureorder','uses' => 'PaypalController@capturePaymentWithpaypal'));
Route::get('paypalreturn', array('as' => 'paypal.paypalreturn','uses' => 'PaypalController@returnpPaypal'));
Route::get('paypalcancel', array('as' => 'paypal.paypalcancel','uses' => 'PaypalController@cancelPaypal'));
