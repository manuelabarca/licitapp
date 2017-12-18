@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
           <div class="panel-heading"> 
                    <label for="buscador">Buscar por palabra clave</label>
                    <input name="buscador" id="buscador" type="text" />
                </div>
                <div class="panel-heading">Ordenes de compra del dia</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="lista" class="table table-striped">
                    <tr>
                    <th>Codigo Orden de compra</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                    </tr>
                   	@foreach ($ordenes->Listado as $orden)

                    <tr data-id="{{ $orden->Codigo }}">
                    <td>{{$orden->Codigo }}</td>
                    <td>{{$orden->Nombre}}</td>
                     @switch($orden->CodigoEstado)
                            @case(4)
                             <td>Enviada a proveedor</td>
                            @break
                        @case(6)
                            <td>Aceptada</td>
                            @break
                            @case(9)
                            <td>Cancelada</td>
                            @break
                            @case(12)
                            <td>Recepci�n Conforme</td>
                            @break
                            @case(13)
                            <td>Pendiente de Recepcionar</td>
                            @break
                            @case(14)
                            <td>Recepcionada Parcialmente</td>
                            @break
                            @case(15)
                            <td>Recepcion Conforme Incompleta</td>
                            @break
                            @default
                            <td>No existe informacion</td>
              @endswitch
                    
                    <td>
                    <a href="seguir/{{$orden->Codigo}}" class="btn btn-default">Seguir</a>
                    <a href="{{ url('/') }}/buscarL?codigo={{ $orden->Codigo }}" class="btn btn-default">Ver</a>
                    </td>
                    </tr>
                    


                     @endforeach


                    </table>
</div>
                        </div>
                        </div>
                        </div>
</div>

@endsection