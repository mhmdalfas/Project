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
Route::get('jointable', 'JoinTableController@index')->name('join');
Route::get('search', 'JoinTableController@search')->name('search');
//Route::get('update', 'JoinTableController@update')->name('update');
Route::get('edit', 'JoinTableController@edit')->name('edit');





Route::resource('hll','OrderController');
Route::get('/order', 'OrderController@create')->name('store');
Route::get('update', 'JoinTableController@update')->name('update');


Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');





//Route::resource('index', 'ConsigneeController');
//Route::view('hll.edit','edit');
//Route::view('hll.editc','editc');
//Route::view('hll.editq','editq');
//Route::get('hll.editc', 'OrderController@editc')->name('editc');


Route::view('hll.order','order');




Route::resource('mdespatch', 'DespatchController');
Route::resource('domestic', 'DomesticController');
Route::resource('mood', 'MoodsController');








//Route::view('hll.cons','cons');


//Route::resource('quar', 'quarters');
//Route::view('hll.quar','quar');
//blaaaaah


//Student

