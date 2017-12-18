<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\DB;
use JavaScript;
class CompararController extends Controller

{
    public function index()
    {

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
    
    //LLamo a los input con los datos mas relevantes, para comparar.
      $datosLicitacionPrevia = [
                        'codigo' => $request->get('codigoExterno'),
                        'nombre' => $request->get('nombre'),
                        'estado' => $request->get('estado'),
                        'nombreorga' => $request->get('nombreorganismo'),
                        'codigoorga' => $request->get('codigoorganismo'),
                        'diascierre' => $request->get('diascierre'),
                        'montoestimado' =>$request->get('montoestimado'),
                        'cantidadproducto' =>$request->get('cantidadproductos'),
                        'reclamos' =>$request->get('reclamos'),
                        'descripcionItems' =>$request->get('descripcion'),
                        'contacto' =>$request->get('contacto')
                        
                      ];
 //Codigo de la licitacion a comparar
 $client = new Client([
	   // Base URI is used with relative requests
	    'base_uri' => 'http://api.mercadopublico.cl',
	    // You can set any number of default request options.
	    'timeout'  => 2.0,
		]);
   
   $codigo = $request->input('codigo');
   
   $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?codigo={$codigo}&ticket=23FB31DD-9988-406C-AB70-4E24D490131D");

	    $licitacion = json_decode( ($response ->getBody() -> getContents()) );
      foreach($licitacion->Listado as $lici)
      {
        $licitacionComparar = [
                        'codigo2' =>$lici->CodigoExterno,
                        'nombre2' => $lici->Nombre,
                        'estado2' => $lici->CodigoEstado,
                        'nombreorga2' => $lici->Comprador->NombreOrganismo,
                        'codigoorga2' => $lici->Comprador->CodigoOrganismo,
                        'contacto2' => $lici->EmailResponsableContrato,
                        'diascierre2' => $lici->DiasCierreLicitacion,
                        'montoestimado2' =>$lici->MontoEstimado,
                        'cantidadproducto2' =>$lici->Items->Cantidad,
                        'reclamos2' =>$lici->CantidadReclamos,
                        
                      ];
                      
      }
      
      $montoporproducto1 = $request->get('montoestimado')/$request->get('cantidadproductos');
      $montoporproducto2 = $lici->MontoEstimado/$lici->Items->Cantidad;
      \JavaScript::put([
      'codigoLicitacion1' =>$request->get('codigoExterno'),
      'codigoLicitacion2' =>$lici->CodigoExterno,
			'montoestimado1' => intval($request->get('montoestimado')),
			'montoestimado2' => $lici->MontoEstimado,
      'producto1' => intval($request->get('cantidadproductos')),
      'producto2'  =>$lici->Items->Cantidad,
      'montoproducto1' => $montoporproducto1,
      'montoproducto2' => intval($montoporproducto2),
      'reclamos1' => intval($request->get('reclamos')),
      'reclamos2' => $lici->CantidadReclamos,
      'empresa1' =>$request->get('nombreorganismo'),
      'empresa2' =>$lici->Comprador->NombreOrganismo
		]);

        foreach($lici->Items->Listado as $li)
        {   
            $items = [
              'descripcionItems2' => $li->Descripcion,
              ];
        }
      return view('comparando')->with($licitacionComparar)->with($datosLicitacionPrevia)->with($items);
    }
}
