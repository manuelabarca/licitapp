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


Auth::routes();
Route::get('/', ['uses' => 'WelcomeController@index']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', ['uses' =>  'LicitacionesController@busqueda']);
Route::get('/rubro', ['uses' => 'RubroController@index']);
Route::get('/rubro', ['uses' => 'RubroController@separarRubros']);
Route::get('/herramientas', ['uses' => 'HerramientasController@index']);

Route::get('/admin', ['uses' => 'HomeController@admin']);


