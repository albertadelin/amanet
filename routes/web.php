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

Route::get('/', function(){
    return view('welcome');
});


Route::get('/produse', 'ProductsController@index');
Route::get('/produse/show', 'ProductsController@tableData');
Route::post('/produse', 'ProductsController@create');
Route::get('/produs/{id}/delete', 'ProductsController@destroy');
Route::get('/produs/{id}/update/form', 'ProductsController@indexUpdate');
Route::post('/produs/{id}/update', 'ProductsController@update');

Route::get('/contract', 'ContractsController@index');
Route::get('/contract/show', 'ContractsController@tableData');
Route::post('/contract', 'ContractsController@create');
Route::get('/contract/{id}/delete', 'ContractsController@destroy');

Route::get('/contract/{id}/update/form', 'ContractsController@indexUpdate');
Route::post('/contract/{id}/update', 'ContractsController@update')->name('contract_update');

Route::get('/pdf/{id}', 'ContractsController@generatePdf');



Route::get('/lichidari', 'LiquidationsController@index');
Route::get('/lichidari/pdf/{id}', 'LiquidationsController@generatePdf');
Route::get('/lichidari/show', 'LiquidationsController@tableData');

