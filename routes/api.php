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
Route::group(['middleware' => ['jwt.verify']], function ()
{
 Route::get('/kelas', 'KelasController@show');
 Route::post('/kelas', 'KelasController@store');

 Route::get('/siswa', 'SiswaController@show');
 Route::get('/siswa/{id}', 'SiswaController@detail');
 Route::post('/siswa', 'SiswaController@store');
 Route::put('/siswa/{id}', 'SiswaController@update');
 Route::delete('/siswa/{id}', 'SiswaController@destroy');
});