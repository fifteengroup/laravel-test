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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('contacts', 'ContactsController@index')->name('contacts');
    Route::get('contacts/create', 'ContactsController@create')->name('contacts.create');
    Route::post('contacts/create', 'ContactsController@store')->name('contacts.store');
    Route::get('contacts/{contact}/edit', 'ContactsController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}/update', 'ContactsController@update')->name('contacts.update');

    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('companies/create', 'CompaniesController@create')->name('companies.create');
    Route::post('companies/create', 'CompaniesController@store')->name('companies.store');
    Route::get('companies/{company}/edit', 'CompaniesController@edit')->name('companies.edit');
    Route::post('companies/{company}/update', 'CompaniesController@update')->name('companies.update');

    Route::get('addresses', 'AddressController@index')->name('addresses');
    Route::get('addresses/create', 'AddressController@create')->name('addresses.create');
    Route::post('addresses/create', 'AddressController@store')->name('addresses.store');
    Route::get('addresses/{address}/edit', 'AddressController@edit')->name('addresses.edit');
    Route::post('addresses/{address}/update', 'AddressController@update')->name('addresses.update');

    Route::get('orders', 'OrderController@index')->name('orders');
    Route::get('orders/create', 'OrderController@create')->name('orders.create');
    Route::post('orders/create', 'OrderController@store')->name('orders.store');
    Route::get('orders/{order}/edit', 'OrderController@edit')->name('orders.edit');
    Route::post('orders/{order}/update', 'OrderController@update')->name('orders.update');

    Route::get('items', 'ItemController@index')->name('items');
    Route::get('items/create', 'ItemController@create')->name('items.create');
    Route::post('items/create', 'ItemController@store')->name('items.store');
    Route::get('items/{item}/edit', 'ItemController@edit')->name('items.edit');
    Route::post('items/{item}/update', 'ItemController@update')->name('items.update');

});

Route::get('/home', 'HomeController@index')->name('home');
