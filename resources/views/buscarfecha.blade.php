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
                    <div class="panel-heading">Licitaciones del dia</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
<ul class="list-group"id="lista">
                        @foreach ($licitaciones->Listado as $licitacion)

                          
                            

                                <li class="list-group-item">
                                    <a href="{{ url('/') }}/buscarL?codigo={{ $licitacion->CodigoExterno }}" class="list-group-item" target="_blank" >
                                        {{ $licitacion->Nombre }} <a id="seguir" href="seguir/{{$licitacion->CodigoExterno}}" class="btn btn-info btn-sm">
                                            <span class="glyphicon glyphicon-flag"></span>Seguir
                                        </a>
                                    </a>
                                    </li>
                                    
                                    @endforeach
                                    </ul>
                                    


                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection