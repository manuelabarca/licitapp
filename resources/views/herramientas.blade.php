@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Herramientas disponibles</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                  <div class="list-group">
                      <a href="{{url('/comparar')}}" class="list-group-item">Comparar licitaciones</a>
                      <a href="{{url('/descargarD')}}" class="list-group-item">Descargar documentos</a>
                      <a href="#" class="list-group-item">Pronto.. nueva herramienta</a>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection