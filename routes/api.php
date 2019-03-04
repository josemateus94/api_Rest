<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1'], function () {
    Route::apiResource('/product', 'ProductController'); 
});