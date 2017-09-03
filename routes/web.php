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
    return redirect()->to('login');
});

Auth::routes();

Route::get('/home', 'App\HomeController@index')->name('home');


Route::group(['namespace' => 'App\Account', 'prefix' => 'settings'], function ($app) {

    $app->get('/', function () {
        return redirect()->to('settings/company');
    });

    $app->get('/company', 'OrganizationController@editOrganisation');

    $app->get('/profile', 'ProfileController@editProfile');

    $app->get('/password', 'PasswordController@editPassword');

});






Route::group(['namespace' => 'App\Invoices', 'prefix' => 'invoices'], function ($app) {



    $app->get('/', 'InvoicesController@index');
});

Route::group(['namespace' => 'App\Contacts', 'prefix' => 'contacts'], function ($app) {

    $app->get('/', 'ContactsController@index');

    $app->post('/', 'ContactsController@store');
    $app->get('/new', 'ContactsController@create');
    $app->get('/{contacts}', 'ContactsController@show');
    $app->get('/{contacts}/edit', 'ContactsController@edit');
    $app->patch('/{contacts}', 'ContactsController@update');
    $app->delete('/{contacts}', 'ContactsController@destroy');

    $app->post('/{contacts}/addresses', 'AddressesController@store');
    $app->get('/{contacts}/addresses/{addresses}', 'AddressesController@show');
    $app->patch('/{contacts}/addresses/{addresses}', 'AddressesController@update');
    $app->delete('/{contacts}/addresses/{addresses}', 'AddressesController@destroy');

    $app->post('/{contacts}/people', 'PeopleController@store');
    $app->get('/{contacts}/people/{people}', 'PeopleController@show');
    $app->patch('/{contacts}/people/{people}', 'PeopleController@update');
    $app->delete('/{contacts}/people/{people}', 'PeopleController@destroy');


});
