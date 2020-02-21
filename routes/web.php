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
    Route::get('contacts/create', 'ContactsController@create')->name('contacts-create');
    Route::post('contacts/create', 'ContactsController@store')->name('contacts-store');
    Route::get('contacts/{contact}/edit', 'ContactsController@edit')->name('contacts-edit');
    Route::post('contacts/{contact}/update', 'ContactsController@update')->name('contacts-update');

    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('companies/create', 'CompaniesController@create')->name('companies-create');
    Route::post('companies/create', 'CompaniesController@store')->name('companies-store');
    Route::get('companies/{company}/edit', 'CompaniesController@edit')->name('companies-edit');
    Route::post('companies/{company}/update', 'CompaniesController@update')->name('companies-update');
    Route::get('companies/contacts/{id}', 'CompaniesController@getContacts')->name('companies-contacts');

    Route::resource('orders', 'OrdersController', ['names' => [
        'index'  => 'orders',
        'create' => 'orders-create',
        'store'  => 'orders-store',
        'show'   => 'orders-show'
    ]]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
