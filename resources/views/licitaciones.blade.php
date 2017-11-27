@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
           <div class="panel-heading"> 
                 {!! Form::open(array('url' => 'buscaretiqueta', 'class' =>'form-group', 'method' => 'get'))!!}
                 {!! Form::label('Buscar licitacion por palabra clave') !!}
                  {!! Form::text('codigo') !!}
                  {!! Form::submit('Buscar') !!}
                  {!! Form::close() !!}
                </div>
                <div class="panel-heading">Licitaciones del dia</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   	@foreach ($licitaciones->Listado as $licitacion)
                  <div class="list-group">
	                  	<a href="{{ url('/') }}/buscarL?codigo={{ $licitacion->CodigoExterno }}" class="list-group-item" target="_blank" >
                      {{ $licitacion->Nombre }} <a id="seguir" href="seguir/{{$licitacion->CodigoExterno}}" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-flag"></span> Seguir
        </a>


                     @endforeach
</div>
                        </div>
                        </div>
                        </div>
</div>

@endsection