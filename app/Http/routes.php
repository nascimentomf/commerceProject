<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [ 'as' => 'home', function () {
    return view('home');
}]);

//Grupo de rotas admin
Route::group(['prefix'=> 'admin'], function (){
    // Categories
    Route::group(['prefix'=> 'categories'], function () {
        Route::get('', [ 'as' => 'categories', 'uses' => 'AdminCategoriesController@index']);
        Route::get('{id}/destroy', [ 'as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('create', [ 'as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::put('store', [ 'as' => 'categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::put('{id}/update', [ 'as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('{id}/edit', [ 'as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
    });
    //Products
    Route::group(['prefix'=> 'products'], function () {
        Route::get('', [ 'as' => 'products', 'uses' => 'AdminProductsController@index']);
        Route::get('{id}/destroy', [ 'as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('create', [ 'as' => 'products.create', 'uses' => 'AdminProductsController@create']);
        Route::put('store', [ 'as' => 'products.store', 'uses' => 'AdminProductsController@store']);
        Route::put('{id}/update', [ 'as' => 'products.update', 'uses' => 'AdminProductsController@update']);
        Route::get('{id}/edit', [ 'as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
    });
});
