@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comparar licitaciones</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                  <div class="row">
            <div class="col-md-4 col-md-offset-4">
            
                  {!! Form::open(array('url' => 'buscarL', 'class' =>'form-group', 'method' => 'get'))!!}
                  {!! Form::label('Agregar licitacion') !!}

                  {!! Form::text('codigo') !!}
                  </div>
                  <div class="col-md-2 col-md-offset-5">
                  {!! Form::submit('Agregar') !!}
                  </div>
                  {!! Form::close() !!}
    
</div>
                  
                    

                        </div>
                        </div>
                        </div>
</div>
@endsection