@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
           <div class="panel-heading">
               <table class="table table-striped">
                   <tr>
                       <th>Filtro por fechas</th>
                       <th>Filtro por palabra clave</th>
                   </tr>
                   <tr>
                       <td>
               {!! Form::open(array('url' => 'buscarfecha', 'class' =>'form-group', 'method' => 'get')) !!}

               {!! Form::date('fecha', \Carbon\Carbon::now(), array('required', 'class' => 'form-control', 'placeholder' => 'Ingresa fecha', 'max' =>\Carbon\Carbon::now()->format('Y-m-d') )) !!}
                           </br>
                           {!! Form::date('fecha2', \Carbon\Carbon::now(), array('required', 'class' => 'form-control', 'placeholder' => 'Ingresa fecha', 'max' =>\Carbon\Carbon::now()->format('Y-m-d') )) !!}
               {!! Form::submit('Filtrar') !!}
               {!! Form::close() !!}</td>
                       <td>
                    <label for="buscador">Buscar por palabra clave</label>
                    <input name="buscador" id="buscador" type="text" />
                 </td>
                   </tr>
               </table>
                </div>
                <div class="panel-heading">Licitaciones del dia</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="lista" class="table table-striped">
                    <tr>
                    <th>Codigo Licitacion</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                    </tr>
                   	@foreach ($licitaciones->Listado as $licitacion)
                    <tr data-id="{{ $licitacion->CodigoExterno }}">
                    <td>{{$licitacion->CodigoExterno }}</td>
                    <td>{{$licitacion->Nombre}}</td>
                     @switch($licitacion->CodigoEstado)
                            @case(5)
                             <td>Publicada</td>
                            @break
                        @case(6)
                            <td>Cerrada</td>
                            @break
                            @case(7)
                            <td>Desierta</td>
                            @break
                            @case(8)
                            <td>Adjudicada</td>
                            @break
                            @case(18)
                            <td>Revocada</td>
                            @break
                            @case(19)
                            <td>Suspendida</td>
                            @break
                            @default
                            <td>No existe informacion</td>
              @endswitch
                    <td>
                    <a href="seguir/{{$licitacion->CodigoExterno}}" class="btn btn-default">Seguir</a>
                    <a href="{{ url('/') }}/buscarL?codigo={{ $licitacion->CodigoExterno }}" class="btn btn-default">Ver</a>
                    </td>
                    </tr>
                    
            

                     @endforeach
                     
                     
</div>
                        </div>
                        </div>
                        </div>
</div>

@endsection
