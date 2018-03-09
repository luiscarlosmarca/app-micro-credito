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

	$prestamos = credito\Persona::all();
	return view('table', compact('prestamos')); 
});


Auth::routes();

Route::get('/home/{fecha}', 'HomeController@index')->name('home');

Route::get('/home/filter', 'CarteraController@index')->name('cartera');

Route::get('/carteras', 'HomeController@carteras')->name('carteras');

Route::get('/cobradores', 'HomeController@cobradores')->name('cobradores');

Route::get('/clientes', 'HomeController@clientes')->name('clientes');

Route::get('/cobros', 'HomeController@cobros')->name('cobros');

Route::get('/movimientos/{id}', 'HomeController@movimientos')->name('movimientos');

Route::get('/prestamos', 'HomeController@prestamos')->name('prestamos');

Route::get('/gastos', 'HomeController@gastos')->name('gastos');

Route::resource('cartera', 'CarteraController', ['except'=>'show','create','edit']);

Route::resource('persona','PersonaController',['except'=>'create','edit']);

Route::resource('gasto','GastoController',['except'=>'create','edit']);

Route::resource('prestamo','PrestamoController',['except'=>'create','edit']);

Route::resource('cobro','CobroController',['except'=>'edit']);






