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

Route::get('/', [ 'uses' => 'BeerController@index' ]);
Route::get('beer/random', [ 'uses' => 'BeerController@random', 'as' => 'beer.random' ]);
Route::post('beer/search', [ 'uses' => 'BeerController@search', 'as' => 'beer.search' ]);
Route::resource('beer', 'BeerController', [ 'only' => [ 'index', 'show' ] ]);