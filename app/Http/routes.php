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

#Route::get('/', function () {
#    return view('welcome');
#});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password'=>'Auth\PasswordController',
]);

//Inicio:
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::get('/saida','HomeController@saida');

Route::get('/login', 'Auth\AuthController@getLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');


Route::group(['middleware' => ['web']], function () {
	//PARTICIPANTE:
	Route::get('/participante','ParticipanteController@index');

	Route::post('/participante/adicionar','ParticipanteController@adicionar');

	Route::get('/participante/novo','ParticipanteController@novo');


});

Route::group(['middleware' => ['web', 'auth']], function () {
	//Login, Logout:
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

	// Rotas de Registros...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	//ADMIN ROUTE:
	Route::get('/dashboard', 'UserController@toDashboard');

	Route::get('/users/add', 'UserController@getAdd');
	Route::post('/users/add', 'UserController@postAdd');
});