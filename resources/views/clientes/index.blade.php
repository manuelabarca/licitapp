

@if(Auth::user()->estado === 3)
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de administracion de clientes</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
          @if(Session::has('success'))
          <h3>{{ Session::get('success')}}</h3>
          @endif
          <table class="table table-striped">
                <thead>
                    <tr>
                  <th>ID</th>
                  <th>id</th>
                  <th>Nombre Cliente</th>
                  <td>Email Cliente</th>                  
                  <td>Encargado Cliente</th>
                  <td>RUT Cliente</th>
                  <th>Rubro Cliente</th>
                        <th>
                            <a href="{{URL('/clientes/create')}}" class="btn btn-success btn-xs">Crear cliente</a>
                        </th>
            </tr>
                  </thead>
                  <tbody>
                    <?php   $id = Auth::user()->id   ?>
                  @foreach($clientes as $key => $cliente)
                  @if($cliente->idUsuario == $id)
                    <tr>
                     <td>{{($key+1)}}</td>
                      <td>{{$cliente->idUsuario	}}</td>
                      <td>{{$cliente->nombreEmpresaCliente}}</td>
                       <td>{{$cliente->correoContactoCliente}}</td>
                        <td>{{$cliente->encargadoEmpresaCliente}}</td>
                         <td>{{$cliente->rutEmpresaCliente}}</td>
                          <td>{{$cliente->rubroEmpresaCliente}}</td>
                          <td>
                            <center>
                                <a href="{{URL('/clientes/' . $cliente->id . '/edit')}}" class="btn btn-xs btn-info" >Editar</a>
                                <form action="{{URL('/clientes/' .$cliente->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
                                </form>
                                <a href="{{URL('/clienteR/' . $cliente->id)}}" class="btn btn-xs btn-primary" >Ver</a>
                            </center>
                          </td>
                    </tr>
                    @endif
                  @endforeach
                  </tbody>
                  </table>
             
<div>
<a href="{{url('/admin')}}" class="btn btn-info" role="button">Volver</a>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection
@else
    {!! header("Location: https://licitapp.cl") !!}
    {!! die() !!}
@endif