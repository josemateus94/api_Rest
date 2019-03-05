<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1', 'middleware' => 'jwt.auth'], function () {
    Route::apiResource('/product', 'ProductController');     
});
Route::post('auth', 'Auth\AuthApiController@authenticate' );
Route::get('user', 'Auth\AuthApiController@getAuthenticatedUser' ); // pusca o usuario atraves do token