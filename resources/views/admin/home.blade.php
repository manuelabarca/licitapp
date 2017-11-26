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
                      <a href="#" class="list-group-item">CRUD usuarios</a>
                      <a href="#" class="list-group-item">Ver log de registro</a>
                      <a href="#" class="list-group-item">Pronto.. nueva herramienta</a>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection