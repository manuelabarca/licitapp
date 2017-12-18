<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Seguir;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Notifications\todasNotificaciones;
use App\Notifications\CierreLicitacion;
use JavaScript;

class LicitacionesController extends Controller
{
    public function busqueda()
    {
    
     $client = new Client([
	    // Base URI is used with relative requests
	    'base_uri' => 'http://api.mercadopublico.cl',
	    // You can set any number of default request options.
	    'timeout'  => 3.1,
         
         ]);
      $hoy = Carbon::today();
	    $date = $hoy;
	    $date = $date->format('d-m-Y');
	    $date = str_replace('-','',$date);
      $contadorPublicadas = 0;
      $contadorCerradas = 0;
      $contadorAdjudicadas = 0;
      $contadorDesiertas = 0;
	    $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?fecha={$date}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");
         
	    $licitaciones = json_decode( ($response ->getBody() -> getContents()) );
           foreach($licitaciones->Listado as $licitacion){
                  if($licitacion->CodigoEstado == 5){
                   $contadorPublicadas++; }
                   if($licitacion->CodigoEstado == 6){
                   $contadorCerradas++;}
                   if($licitacion->CodigoEstado == 8){
                   $contadorAdjudicadas++;}
                    if($licitacion->CodigoEstado == 7){
                   $contadorDesiertas++;}
                   }
                   

     	\JavaScript::put([
			'publicadas' => $contadorPublicadas,
			'cerradas' => $contadorCerradas,
      'adjudicadas' => $contadorAdjudicadas,
      'desiertas' => $contadorDesiertas
		]);
         
         
         return view('home', compact('licitaciones'));
    }
    public function todas()
    {
    $client = new Client([
	    // Base URI is used with relative requests
	    'base_uri' => 'http://api.mercadopublico.cl',
	    // You can set any number of default request options.
	    'timeout'  => 3.1,
         
         ]);
      $hoy = Carbon::today();
	    $date = $hoy;
	    $date = $date->format('d-m-Y');
	    $date = str_replace('-','',$date);

	    $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?fecha={$date}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");

	    $licitaciones = json_decode( ($response ->getBody() -> getContents()) );
         
         
         return view('licitaciones', compact('licitaciones'));
    
    }
    
    public function seguir($codigo)
    {
    
    
      $seguirN = new Seguir;
      $seguirN->codigo = $codigo;
      $seguirN->id_user = Auth::user()->id;
      $seguirN->save();
      
      $notificacion = array(
      'message' => 'Se ha agregado a tu lista de licitaciones seguidas',
      'alert-type' => 'success'
      );
      
      auth()->user()->notify(new todasNotificaciones($codigo));
       auth()->user()->notify(new CierreLicitacion());
      
      
      return back()->with($notificacion);
    }
    
    public function seguidas()
    {
    $siguiendo = Seguir::where('id_user', Auth::user()->id)->orderBy('codigo')->get();
    return view('seguidas', compact('siguiendo'));
    }
    
    /*Buscador por etiqueta*/
    
     
    public function buscarEtiqueta(Request $request)
    {
    $palabra = $request->get('palabra');
     $client = new Client([
	    // Base URI is used with relative requests
	    'base_uri' => 'http://api.mercadopublico.cl',
	    // You can set any number of default request options.
	    'timeout'  => 3.1,
         
         ]);
      $hoy = Carbon::today();
	    $date = $hoy;
	    $date = $date->format('d-m-Y');
	    $date = str_replace('-','',$date);

	    $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");

	    $licitaciones = json_decode( ($response ->getBody() -> getContents()) );
         
         return view('buscaretiqueta', compact('licitaciones', 'palabra'));
    }
    
    public function filtroFechas(Request $request){
    
     $client = new Client([
	    // Base URI is used with relative requests
	    'base_uri' => 'http://api.mercadopublico.cl',
	    // You can set any number of default request options.
	    'timeout'  => 2.0,
		]);

	    $fecha = $request->get('fecha');
      $fecha2 = $request->get('fecha2');
	    $date3 = new Carbon($fecha);
      $date4 = new Carbon($fecha2);
      for ($date = clone$date3; $date->diffInDays($date4)>0;$date->addDay()){
      
          $date = $date->format('d-m-Y');
          $date = str_replace('-','',$date);
          
          $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?fecha={$date}&ticket=F8537A18-6766-4DEF-9E59-426B4FEE2844");
         
          $date = wordwrap($date,2,"-", TRUE);
          $date = substr_replace($date, '', 8,-2);
          $date = new Carbon($date);
          
      }
      
	    /*$date = $date->format('d-m-Y');
      $date2 = $date2->format('d-m-Y');
	    $date = str_replace('-','',$date);
      $date2 = str_replace('-','', $date2);

	    $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?fecha={$date}&ticket=F8537A18-6766-4DEF-9E59-426B4FEE2844");*/

	    $licitaciones = json_decode( ($response ->getBody() -> getContents()) );

	    return view('buscarfecha', compact('licitaciones'));
    }
}
