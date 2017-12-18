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
                      <a href="{{url('/comparar')}}" class="list-group-item">Comparar empresas del estado</a>
                      <a href="{{url('/convertir')}}" class="list-group-item">Convertir documentos</a>
                      <a href="http://www.mercadopublico.cl/Portal/att.ashx?id=13" class="list-group-item">Descargar Licitaciones Destacadas</a>
                      <a href="http://datosabiertos.chilecompra.cl/Data/Descargar?guid=28" class="list-group-item">Descargar todas las ordenes de compra</a>
                      <a href="{{url('/notificaciones')}}" class="list-group-item">Crear notificaciones</a>
                      <a href="#" class="list-group-item">Pronto.. nueva herramienta</a>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection