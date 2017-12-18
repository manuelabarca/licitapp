<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Seguir;


class RubroController extends Controller
{
    public function index(){
    
    return view('rubro');
    }
    
    public function separarRubros(){
    
    $rubros = \DB::table('users')->where('id', Auth::user()->id)->get();
    
    foreach($rubros as $rubro){
    $separar = explode(",", $rubro->rubro);
    }
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
         
    return view('rubro', compact('separar', 'licitaciones'));
    
    }
}
