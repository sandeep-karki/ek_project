<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {
    $api->post('v1/verify/auth/token', 'AuthController@activateRegisterLink');
    $api->post('v1/auth/register', 'AuthController@register');
    $api->post('v1/auth/password', 'AuthController@setPassword');
    $api->post('v1/auth/login', 'AuthController@login');
    $api->post('v1/auth/forgotpassword', 'AuthController@forgotPassword');
});

//v2 test api

$api->version('v2', ['namespace' => 'App\Http\Controllers\api\v2'], function ($api) {
    $api->resource('v2/articles', 'TestController');
    $api->patch('v2/articles/{articles}/relationships/catgories', 'TestController@updateRelationship');
});
