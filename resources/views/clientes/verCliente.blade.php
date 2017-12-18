@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Licitaciones segun rubro de cliente</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @for($i = 0; $i < count($separar); $i++)
                     <div class="panel-heading">Licitaciones por el rubro: {{$separar[$i]}}</div>
                      
	@foreach ($licitaciones->Listado as $licitacion)
                     
                      @if(str_contains($licitacion->Nombre, $separar[$i]) || str_contains($licitacion->Nombre, strtoupper($separar[$i])) || str_contains($licitacion->Nombre, ucfirst($separar[$i]))|| str_contains($licitacion->Nombre, strtolower($separar[$i]))|| str_contains($licitacion->Nombre, ucfirst(strtolower($separar[$i]))))
                  <div class="list-group">
	                  	<a href="{{ url('/') }}/buscarL?codigo={{ $licitacion->CodigoExterno }}" class="list-group-item" target="_blank" >
                      {{ $licitacion->Nombre }} <a id="seguir" href="seguir/{{$licitacion->CodigoExterno}}" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-flag"></span>Seguir
        </a>
 @endif
                     @endforeach
                    @endfor
                  
                    
                    
                        </div>
                        </div>
                        </div>
</div>
@endsection