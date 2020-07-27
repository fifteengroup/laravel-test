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
    Route::get('contacts/{contact}', 'ContactsController@show')->name('contacts.show');
    Route::get('contacts/{contact}/edit', 'ContactsController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}/update', 'ContactsController@update')->name('contacts.update');

    Route::get('addresses', 'AddressesController@index')->name('addresses');
    Route::get('addresses/create', 'AddressesController@create')->name('addresses.create');
    Route::post('addresses/create', 'AddressesController@store')->name('addresses.store');
    Route::get('addresses/{address}/edit', 'AddressesController@edit')->name('addresses.edit');
    Route::post('addresses/{address}/update', 'AddressesController@update')->name('addresses.update');

    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('companies/create', 'CompaniesController@create')->name('companies.create');
    Route::post('companies/create', 'CompaniesController@store')->name('companies.store');
    Route::get('companies/{company}/edit', 'CompaniesController@edit')->name('companies.edit');
    Route::post('companies/{company}/update', 'CompaniesController@update')->name('companies.update');

    Route::get('orders', 'ordersController@index')->name('orders');
    Route::get('orders/create', 'ordersController@create')->name('orders.create');
    Route::post('orders/create', 'ordersController@store')->name('orders.store');
    Route::get('orders/{order}', 'ordersController@show')->name('orders.show');
    Route::get('orders/{order}/readytodespatch', 'ordersController@updateStatusReadyToDespatch')->name('orders.updateStatusReadyToDespatch');
    Route::get('orders/{order}/complete', 'ordersController@updateStatusComplete')->name('orders.updateStatusComplete');
    Route::get('orders/{order}/notificationmarkasread', 'ordersController@notificationMarkAsRead')->name('orders.notificationMarkAsRead');

    Route::get('orders/{order}/orderItems/create', 'orderItemsController@create')->name('orderItems.create');
    Route::post('orders/{order}/orderItems/create', 'orderItemsController@store')->name('orderItems.store');
    Route::get('orders/{order}/orderItems/{orderItem}', 'orderItemsController@show')->name('orderItems.show');
});

Route::get('/home', 'HomeController@index')->name('home');
