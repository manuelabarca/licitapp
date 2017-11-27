<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Session;

class CompararController extends Controller
{
    public function index()
    {
    return view('comparar');
    }
    
    
    //Aqui se buscara la informacion de una licitacion en especifico.
    public function primerComparar(Request $request)
    {
      	    $client = new Client([
	    // Base URI is used with relative requests
	    'base_uri' => 'http://api.mercadopublico.cl',
	    // You can set any number of default request options.
	    'timeout'  => 2.0,
		]);
   
   $codigo = $request->get('codigo');
   
   $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?codigo={$codigo}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");

	    $licitacion = json_decode( ($response ->getBody() -> getContents()) );
         
         return view('buscarL', compact('licitacion'));
    
    }
    
    public function comparandoLicitaciones(Request $request)
    {
      $espera = Session::flash('codigo', $request->get('codigoExterno'));
      return view('comparando', compact('espera'));
    }
}
