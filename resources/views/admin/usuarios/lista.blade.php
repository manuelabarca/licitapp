@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios registrados</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
            <ul class="list-group">
            @foreach($users as $usuario)
              <li class="list-group-item">{{$usuario->name}}</li>
@endforeach
</ul>
<div>
<a href="{{url('/admin/usuarios')}}" class="btn btn-info" role="button">Volver</a>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection