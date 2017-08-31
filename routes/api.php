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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1'], function ($app) {

    $app->get('contacts', 'ContactsController@index');
    $app->post('contacts', 'ContactsController@store');
    $app->get('contacts/{contacts}', 'ContactsController@show');
    $app->patch('contacts/{contacts}', 'ContactsController@update');
    $app->delete('contacts/{contacts}', 'ContactsController@destroy');

});