<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home.index']);
Route::get('/client/person', ['uses' => 'ClientController@person', 'as' => 'client.person']);
Route::post('/client/person/save', ['uses' => 'ClientController@save', 'as' => 'client.save']);
Route::get('/client/person/add', ['uses' => 'ClientController@add_person', 'as' => 'client.create']);
Route::get('/client/detail/{id}', ['uses' => 'ClientController@detail', 'as' => 'client.detail']);
Route::get('/client/person/{id}', ['uses' => 'ClientController@get_id', 'as' => 'client.get']);
Route::put('/client/update/{id}', ['uses' => 'ClientController@update', 'as' => 'client.update']);
Route::get('/client/remove/{id}', ['uses' => 'ClientController@delete', 'as' => 'client.delete']);




Route::get('/client/company', ['uses' => 'ClientController@company', 'as' => 'client.company']);
//Route::post('/client/company/add', ['uses' => 'ClientController@company', 'as' => 'client.company']);






Route::post('/phone/create', ['uses' => 'PhoneController@create', 'as' => 'phone.create']);
Route::get('/phone/get/{id}', ['uses' => 'PhoneController@get', 'as' => 'phone.get']);
Route::get('/phone/remove/{id}', ['uses' => 'PhoneController@delete', 'as' => 'phone.delete']);
Route::put('/phone/update/{id}', ['uses' => 'PhoneController@update', 'as' => 'phone.update']);


Route::post('/email/create', ['uses' => 'AddressEmailController@create', 'as' => 'email.create']);
Route::get('/email/get/{id}', ['uses' => 'AddressEmailController@get', 'as' => 'email.get']);
Route::get('/email/remove/{id}', ['uses' => 'AddressEmailController@delete', 'as' => 'email.delete']);
Route::put('/email/update/{id}', ['uses' => 'AddressEmailController@update', 'as' => 'email.update']);


Route::post('/address/create', ['uses' => 'AddressController@create', 'as' => 'address.create']);
Route::get('/address/get/{id}', ['uses' => 'AddressController@get', 'as' => 'address.get']);
Route::get('/address/remove/{id}', ['uses' => 'AddressController@delete', 'as' => 'address.delete']);
Route::put('/address/update/{id}', ['uses' => 'AddressController@update', 'as' => 'address.update']);