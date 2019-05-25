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

Route::get('/', 'WelcomesController@index');
Route::post('/', 'WelcomesController@saveProduct');

Route::get('/contract', 'ContractsController@index');
Route::post('/contract', 'ContractsController@saveContract');


Route::get('/lichidari', 'PagesController@lichidari');

