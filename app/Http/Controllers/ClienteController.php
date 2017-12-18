<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Carbon\Carbon;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
     // $data['clientes'] = DB::table('clientes')->where('idUsuario', '.Auth::user()->id.')->first();
       $data['clientes'] = Cliente::all();
      return view('clientes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $cliente = [
            'idUsuario' => Auth::user()->id,
            'nombreEmpresaCliente' => $request->nombreEmpresaCliente,
            'correoContactoCliente' => $request->correoContactoCliente,
            'encargadoEmpresaCliente' => $request->encargadoEmpresaCliente,
            'rutEmpresaCliente' => $request->rutEmpresaCliente,
            'rubroEmpresaCliente' => $request->rubroEmpresaCliente,

        ];

        $save = Cliente::insert($cliente);
        if($save)
            return redirect('clientes');
        else
            return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['cliente'] = Cliente::find($id);
        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cliente'] = Cliente::find($id);
        return view('clientes/cliente', $data);
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $cliente = [
            'idUsuario' => Auth::user()->id,
            'nombreEmpresaCliente' => $request->nombreEmpresaCliente,
            'correoContactoCliente' => $request->correoContactoCliente,
            'encargadoEmpresaCliente' => $request->encargadoEmpresaCliente,
            'rutEmpresaCliente' => $request->rutEmpresaCliente,
            'rubroEmpresaCliente' => $request->rubroEmpresaCliente,

        ];
        

        $update = Cliente::find($id)->update($cliente);
        if($update)
            return redirect('clientes');
        else
            return redirect()->back()->withInput();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->destroy($id);
            $msg = 'El usuario ha sido eliminado';

        } else {
           $msg = 'Error: No se pudo eliminar al usuario';
        }
        return redirect()
            ->back()
            ->withSuccess($msg);
    }
    
    
    
    
    
    
    /* Controlador vista clientes*/
    public function indexC(){    
    return view('clientes.verCliente');
    }
    
    public function separarRubros(Request $request, $id){
    
    $rubros = \DB::table('clientes')->where('id', $id)->get();
    
    foreach($rubros as $rubro){
    $separar = explode(",", $rubro->rubroEmpresaCliente);
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
         
    return view('clientes.verCliente', compact('separar', 'licitaciones'));
    
    }
}
