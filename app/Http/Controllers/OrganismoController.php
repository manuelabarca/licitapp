<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Seguir;

class OrganismoController extends Controller
{
    public function todos(){
    
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

	    $response = $client -> request('GET', "servicios/v1/Publico/Empresas/BuscarComprador.json?ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");

	    $organismos = json_decode( ($response ->getBody() -> getContents()) );
         
         return view('empresas.index', compact('organismos'));
    
    
    }
}
