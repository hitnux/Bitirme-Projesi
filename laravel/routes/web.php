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
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/purchase', 'ShoppingcardController@store');

Route::resource('urun', 'SingleController');

Route::get('/shoppingcard', 'ShoppingcardController@index');
Route::post('/addcard', 'ShoppingcardController@create');
Route::post('/updatecard', 'ShoppingcardController@update');
Route::get('/pushcard/{id}', 'ShoppingcardController@destroy');

Route::get('/ar',function(){
    return view('ar');
});

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    
    Route::get('/', 'AdminController@index');
    Route::get('/getdata', 'AdminController@show');

});




