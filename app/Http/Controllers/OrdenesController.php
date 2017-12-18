<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Seguir;
class OrdenesController extends Controller
{
    public function index(){
    
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

	    $response = $client -> request('GET', "servicios/v1/publico/ordenesdecompra.json?fecha={$date}&estado=aceptada&ticket=EB9BA9FD-B1DA-4C27-B78D-7A095969577B");

	    $ordenes = json_decode( ($response ->getBody() -> getContents()) );

         
         
         return view('ordenes.index', compact('ordenes'));
    }
}

