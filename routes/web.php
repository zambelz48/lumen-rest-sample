<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('product', ['uses' => 'ProductController@saveProduct']);
    $router->put('product/{id}', ['uses' => 'ProductController@updateProduct']);
    $router->get('product/{id}', ['uses' => 'ProductController@getProduct']);
    $router->delete('product/{id}', ['uses' => 'ProductController@deleteProduct']);

});
