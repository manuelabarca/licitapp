<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Seguir;
use Illuminate\Support\Facades\Auth;

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

	    $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?fecha={$date}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");
         
      $responseOrdenes = $client -> request('GET', "servicios/v1/publico/ordenesdecompra.json?fecha={$date}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");

	    $ordenes = json_decode( ($responseOrdenes ->getBody() -> getContents()) );

	    $licitaciones = json_decode( ($response ->getBody() -> getContents()) );
         
         return view('home', compact('licitaciones', 'ordenes'));
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
      return back()->with($notificacion);
    }
    
    public function seguidas()
    {
    $siguiendo = Seguir::where('id_user', Auth::user()->id)->orderBy('codigo')->get();
    return view('seguidas', compact('siguiendo'));
    }
}
