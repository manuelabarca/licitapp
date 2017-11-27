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
use Illuminate\Http\Request;


Auth::routes();
Route::get('/', ['uses' => 'WelcomeController@index']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', ['uses' =>  'LicitacionesController@busqueda']);
Route::get('/rubro', ['uses' => 'RubroController@index']);
Route::get('/rubro', ['uses' => 'RubroController@separarRubros']);
Route::get('/herramientas', ['uses' => 'HerramientasController@index']);
Route::get('/comparar', ['uses' => 'CompararController@index']);
Route::get('/seguir/{codigo}', ['uses' => 'LicitacionesController@seguir']);
Route::get('/seguidas', ['uses' => 'LicitacionesController@seguidas']);
/* Ruta para el backoffice */
Route::get('/admin', ['uses' => 'HomeController@admin']);
Route::get('/admin/usuarios/', ['uses' => 'UserController@index']);
Route::get('/admin/usuarios/lista', ['uses' => 'UserController@lista']);
/*Ruta para buscar info de una licitacion en especifico*/

Route::get('buscarL', ['uses' => 'CompararController@primerComparar']);

/*Ruta de comparación*/
Route::get('comparando', ['uses' => 'CompararController@comparandoLicitaciones']);
Route::get('/licitaciones', ['uses' => 'LicitacionesController@todas']);

/*Rutas CRUD Backoffice*/

Route::get('/admin/usuarios/crear', ['uses' => 'UserController@crear']);
/*Mostrar todos los usuarios*/
Route::get('/usuarios', function(){

});
/*Agregar un nuevo usuario*/
Route::post('/usuario', function(){
 

});
/*Eliminar un usuario*/
Route::delete('/usuario/{id}', function(){
});
