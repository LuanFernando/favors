<?php

Route::apiResource('usuarios', 'api\UsuarioController');

Route::post('login','api\UsuarioAuthController@login')->name('login');

//Route::get('usuarios','api\UsuarioController@index');