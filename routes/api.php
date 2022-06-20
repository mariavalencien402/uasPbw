<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mahasiswa/all','MahasiswaAPIController@all');

Route::post('/mahasiswa/create','MahasiswaAPIController@create');

Route::post('/mahasiswa/update1','MahasiswaAPIController@update1');

Route::post('/mahasiswa/update2/{id}','MahasiswaAPIController@update2');

Route::delete('/mahasiswa/delete/{id}','MahasiswaAPIController@delete');