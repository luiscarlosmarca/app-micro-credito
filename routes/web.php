<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){

	$personas = credito\Persona::all();
	return view('home', compact('personas')); 
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/carteras', 'HomeController@carteras')->name('carteras');

Route::get('/cobradores', 'HomeController@cobradores')->name('cobradores');

Route::get('/clientes', 'HomeController@clientes')->name('clientes');

Route::get('/cobros', 'HomeController@cobros')->name('cobros');

Route::get('/prestamos', 'HomeController@prestamos')->name('prestamos');

Route::get('/gastos', 'HomeController@gastos')->name('gastos');

Route::resource('cartera', 'CarteraController', ['except'=>'show','create','edit']);

Route::resource('persona','PersonaController',['except'=>'create','edit']);

Route::resource('gasto','GastoController',['except'=>'create','edit']);

Route::resource('prestamo','PrestamoController',['except'=>'create','edit']);

Route::resource('cobro','CobroController',['except'=>'create','edit']);




