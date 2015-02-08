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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

/*
 * Routes for warehouses
 */

Route::get('/warehouses', 'WarehouseController@index');
Route::get('/warehouses/create', [	'as' => 'warehousecreate_path',
									'uses' => 'WarehouseController@create']);
Route::post('/warehouses/create', [	'as' => 'warehousecreate_path',
									'uses' => 'WarehouseController@store']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
