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

Route::get('viagem/teste', 'TripController@teste');

Route::get('/', function () {
    return view('welcome');
});

// utilizando resource para simplicar as rotas.
Route::resource('viagem', 'TripController');
/*

    Route::get('/viagem/cadastrar', 'TripController@create')->name('viagem.create');

    Route::get('/viagem/listar', 'TripController@index')->name('viagem.index');

    Route::get('/viagem/atualizar/{id}', 'TripController@update')->name('viagem.update');

*/