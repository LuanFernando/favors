<?php

Route::apiResource('usuarios', 'api\UsuarioController');

Route::post('login','api\UsuarioAuthController@login')->name('login');
