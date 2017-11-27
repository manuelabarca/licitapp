@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de administracion</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                  <div class="list-group">
                      <a href="{{url('/admin/usuarios/crear')}}" class="list-group-item">Crear usuario</a>
                      <a href="{{url('/admin/usuarios/lista')}}" class="list-group-item">Lista de usuarios registrados</a>
                      <a href="#" class="list-group-item">Editar usuario</a>
                      <a href="#" class="list-group-item">Eliminar usuario</a>
</div>
<div>
<a href="{{url('/admin')}}" class="btn btn-info" role="button">Volver</a>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection