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
use App\Notifications\Slack;
use App\User;
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
//Route::get('/admin/usuarios/', ['uses' => 'UserController@index']);
/*Ruta para buscar info de una licitacion en especifico*/

Route::get('buscarL', ['uses' => 'CompararController@primerComparar']);

/*Ruta para buscar licitaciones por palabra clave*/
Route::get('buscaretiqueta',['uses' => 'LicitacionesController@buscarEtiqueta']);
Route::get('buscarfecha',['uses' => 'LicitacionesController@filtroFechas']);

/*Ruta de comparaci�n*/
Route::get('comparando', ['uses' => 'CompararController@comparandoLicitaciones']);
Route::get('/licitaciones', ['uses' => 'LicitacionesController@todas']);

/*Ordenes de compra*/

Route::get('ordenes', ['uses' => 'OrdenesController@index']);

/*Rutas CRUD Backoffice*/

Route::group(['prefix' => ''], function(){
   Route::resource('admin/usuarios', 'UserController');
});

/*Prueba de seguir con jquery*/

Route::post('/seguir/{codigo}', [
'as' => 'siguiendo',
'uses' => 'LicitacionesController@seguir'
]);

/* Suscripcion premium*/

Route::get('/suscripcion', function(){
  return view('pago.index');
});

/*Rutas empresas del estado*/

Route::get('/empresas', ['uses' => 'OrganismoController@todos']);
/* Ruta notificaciones instantaneas*/

Route::get('/revisadas', function(){
  auth()->user()->unreadNotifications->nRevisada();
});

/*Ruta para OCR*/
Route::get('/ocr', ['uses' => 'OCRController@index']);
/*Licitaciones destacadas, descargar*/
Route::get('/herramientas', ['uses' => 'ArchivosController@index']);

/*Ruta para grafico*/
Route::get('/chart', ['uses' => 'graficoController@index']);

/*Rutas CRUD Clientes*/

Route::group(['prefix' => ''], function(){
   Route::resource('clientes', 'ClienteController');
});

/*Rutas ver Clientes */

Route::get('/clienteR/{id}', ['uses' => 'ClienteController@indexC']);
Route::get('/clienteR/{id}', ['uses' => 'ClienteController@separarRubros']);

/*Ruta para Highchart
Route::get('listado_graficas', 'GraficasController@index');
Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
*/

/*Ruta correos bienvenido*/

Route::get('/video', function()
{
    $users = App\User::first();
    $rubros = App\User::first();
    $users->notify(new Slack($rubros));
});

/* Notificaciones crear*/

Route::get('/notificaciones', ['uses' => 'UserController@irACrearNotificacion']);
Route::get('crearlicitacion', ['uses' => 'UserController@crearNotificacion']);

/*Convertir archivos*/

Route::get('convertir', ['uses' => 'ArchivosController@index']);
