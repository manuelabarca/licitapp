@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            
                <div class="panel-heading">Empresas del estado: <span class="badge">{{ $organismos->Cantidad }}</span></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                    <tr>
                    <th>Codigo Empresa</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                    </tr>
                  @foreach($organismos->listaEmpresas as $organismo)
                   <tr data-id="{{ $organismo->CodigoEmpresa }}">
                    <td>{{$organismo->CodigoEmpresa }}</td>
                    <td>{{$organismo->NombreEmpresa}}</td>
                    <td>
                    <a href="{{ url('/') }}/buscarL?codigo={{  $organismo->CodigoEmpresa }}" class="btn btn-default">Ver</a>
                    </td>
                 
@endforeach
                        </div>
                        </div>
                        </div>
</div>
@endsection