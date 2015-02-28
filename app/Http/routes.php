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

Route::get('warehouses', 'WarehouseController@index');
Route::get('warehouses/create', 'WarehouseController@create');
Route::get('warehouses/edit/{id}', 'WarehouseController@edit');
Route::get('warehouses/delete/{id}', 'WarehouseController@destroy');

Route::post('warehouses', 'WarehouseController@store');
Route::post('warehouses/edit/{id}', 'WarehouseController@update');
Route::delete('warehouses/delete/{id}', 'WarehouseController@destroy');

/*
 * Routes for slots
 */
Route::get('warehouses/{id}/slots/create', 'SlotController@create');
Route::post('warehouses/{id}/slots', 'SlotController@store');
Route::get('warehouses/{id}/slots/{slot}/delete', 'SlotController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
