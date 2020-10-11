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

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::group(['middleware' => ['api.superadmin']], function ()
    {
        Route::delete('/customer/{id}', 'CustomersController@destroy');
        Route::delete('/product/{id}', 'ProductsController@destroy');
        Route::delete('/order/{id}', 'OrdersController@destroy');
    });

    Route::group(['middleware' => ['api.admin']], function ()
    {
        Route::post('/customer', 'CustomersController@store');
        Route::put('/customer/{id}', 'CustomersController@update');

        Route::post('/product', 'ProductsController@store');
        Route::put('/product/{id}', 'ProductsController@update');

        Route::post('/order', 'OrdersController@store');
        Route::put('/order/{id}', 'OrdersController@update');

    });

    Route::get('/customer', 'CustomersController@show');
    Route::get('/customer/{id}', 'CustomersController@detail');

    Route::get('/product', 'ProductsController@show');
    Route::get('/product/{id}', 'ProductsController@detail');

    Route::post('/order', 'OrdersController@show');
    Route::put('/order/{id}', 'OrdersController@detail');

});