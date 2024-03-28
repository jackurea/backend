<?php

Route::post('/login', 'App\Http\Controllers\Auth\AuthController@login');
Route::post('/register','App\Http\Controllers\Auth\AuthController@register');
Route::post('/forget', 'App\Http\Controllers\Auth\AuthController@forget');
Route::post('/reset', 'App\Http\Controllers\Auth\AuthController@reset');
