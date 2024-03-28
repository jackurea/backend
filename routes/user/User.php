<?php

Route::get('/list', '\App\Http\Controllers\User\UserController@listUser');
Route::put('/edit', '\App\Http\Controllers\User\UserController@editUser');
Route::delete('/delete/{name}', '\App\Http\Controllers\User\UserController@deleteUser');
