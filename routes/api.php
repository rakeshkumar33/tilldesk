<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1'], function ($app) {


    $app->get('users', 'UsersController@index');

    $app->group(['middleware' => ['auth:api'], 'namespace' => 'Contacts', 'prefix' => 'contacts'], function ($app) {

        $app->get('/', 'ContactsController@index');
        $app->post('/', 'ContactsController@store');
        $app->get('/{contacts}', 'ContactsController@show');
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










});