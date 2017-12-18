<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Seguir;
use App\Notifications\foroPreguntas;
use App\Notifications\diasCierreLicitacion;
use App\Notifications\diaAdjudicacion;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
    return view('admin.usuarios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'empresa' => $request->empresa,
            'rubro' => $request->rubro,
            'estado' => $request->estado,
            'intermediario' => $request->intermediario,

        ];

        $save = User::insert($user);
        if($save)
            return redirect('admin/usuarios');
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
        $data['user'] = User::find($id);
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
        $data['user'] = User::find($id);
        return view('admin/usuarios/crear', $data);
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
        if($request->has('password')) {
            $password = $request->password;
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'empresa' => $request->empresa,
                'password' => $password,
                'rubro' => $request->rubro,
                'estado' => $request->estado,
                'intermediario' => $request->intermediario,

            ];
        }
        else
        {
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'empresa' => $request->empresa,
                'rubro' => $request->rubro,
                'estado' => $request->estado,
                'intermediario' => $request->intermediario,

            ];
        }

        $update = User::find($id)->update($user);
        if($update)
            return redirect('admin/usuarios');
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
        $user = User::find($id);
        if ($user) {
            $user->destroy($id);
            $msg = 'El usuario ha sido eliminado';

        } else {
           $msg = 'Error: No se pudo eliminar al usuario';
        }
        return redirect()
            ->back()
            ->withSuccess($msg);

    }
    
    /*funciones para que el usuario cree notificaciones*/
    
    public function irACrearNotificacion()
    {
    return view('crearnotificacion');
    }
    
    public function crearNotificacion(Request $request)
    {
    
    $codigo = $request->get('licitacion');
    $foro = $request->get('opcion');
    $adjudicada = $request->get('opcion2');
    $dias = $request->get('opcion3');

    $client = new Client([
	    // Base URI is used with relative requests
	    'base_uri' => 'http://api.mercadopublico.cl',
	    // You can set any number of default request options.
	    'timeout'  => 3.1,
         
         ]);
         
          $response = $client -> request('GET', "servicios/v1/publico/licitaciones.json?codigo={$codigo}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136");
         
	    $licitaciones = json_decode( ($response ->getBody() -> getContents()) );
         
       foreach($licitaciones->Listado as $licitacion)
       {
       if($foro == true && $adjudicada == true && $dias == true)
              {
         $fechaForo = $licitacion->Fechas->FechaPubRespuestas;
          $fechaAdjudicada = $licitacion->Fechas->FechaAdjudicacion;
          $fechaDias = $licitacion->DiasCierreLicitacion;
          auth()->user()->notify(new foroPreguntas($codigo, $fechaForo));
          auth()->user()->notify(new diaAdjudicacion($codigo, $fechaAdjudicada));
          auth()->user()->notify(new diasCierreLicitacion($codigo, $fechaDias));
          session()->flash('message', 'Se crearon con exito las notificaciones');
}
elseif($foro == false && $adjudicada == true && $dias == true){
$fechaForo = "";
          $fechaAdjudicada = $licitacion->Fechas->FechaAdjudicacion;
          $fechaDias = $licitacion->DiasCierreLicitacion;
          auth()->user()->notify(new diaAdjudicacion($codigo, $fechaAdjudicada));
          auth()->user()->notify(new diasCierreLicitacion($codigo, $fechaDias));
          session()->flash('message', 'Se crearon con exito las notificaciones');
}
elseif($foro == false && $adjudicada == false && $dias == true){

$fechaForo = "";
          $fechaAdjudicada = "";
          $fechaDias = $licitacion->DiasCierreLicitacion;
           auth()->user()->notify(new diasCierreLicitacion($codigo, $fechaDias));
          session()->flash('message', 'Se crearon con exito las notificaciones');
}elseif($foro == true && $adjudicada == false && $dias == false){
        $fechaForo = $licitacion->Fechas->FechaPubRespuestas;
          $fechaAdjudicada = "";
          $fechaDias = "";
                    auth()->user()->notify(new foroPreguntas($codigo, $fechaForo));
session()->flash('message', 'Se crearon con exito las notificaciones');
          
}elseif($foro == true && $adjudicada == false && $dias == true){
$fechaForo = $licitacion->Fechas->FechaPubRespuestas;
          $fechaAdjudicada = "";
          $fechaDias = $licitacion->DiasCierreLicitacion;
                    auth()->user()->notify(new foroPreguntas($codigo, $fechaForo));
          auth()->user()->notify(new diasCierreLicitacion($codigo, $fechaDias));
          session()->flash('message', 'Se crearon con exito las notificaciones');
}elseif($foro == true && $adjudicada == true && $dias == false){
$fechaForo = $licitacion->Fechas->FechaPubRespuestas;
          $fechaAdjudicada = $licitacion->Fechas->FechaAdjudicacion;
          $fechaDias = "";
                    auth()->user()->notify(new foroPreguntas($codigo, $fechaForo));
          auth()->user()->notify(new diaAdjudicacion($codigo, $fechaAdjudicada));
          session()->flash('message', 'Se crearon con exito las notificaciones');

}elseif($foro == false && $adjudicada == true && $dias == false){
    $fechaForo = "";
          $fechaAdjudicada = $licitacion->Fechas->FechaAdjudicacion;
          $fechaDias = "";
          auth()->user()->notify(new diaAdjudicacion($codigo, $fechaAdjudicada));
 session()->flash('message', 'Se crearon con exito las notificaciones');
}elseif($foro == false && $adjudicada == false && $dias == false){
      $fechaForo = "";
          $fechaAdjudicada = "";
          $fechaDias = "";
          
}
}
         return view('herramientas');
    }
}
