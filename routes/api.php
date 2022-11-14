<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\PessoaController;

Route::group(['prefix' => 'v1'], function () {
    Route::get('/pessoa', 'Api\PessoaController@index');
    Route::post('/pessoa', 'Api\PessoaController@store');
    Route::get('/pessoa/{id}', 'Api\PessoaController@show')->where('id', '[1-9]+');
    Route::put('/pessoa/{id}', 'Api\PessoaController@update')->where('id', '[1-9]+');
    Route::delete('/pessoa/{id}', 'Api\PessoaController@destroy')->where('id', '[1-9]+');
});