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
    });
    //Products
    Route::group(['prefix'=> 'products'], function () {
        Route::get('', [ 'as' => 'products', 'uses' => 'AdminProductsController@index']);
    });
});
