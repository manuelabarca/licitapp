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
                      {!! Form::open(array('url' => 'crearlicitacion', 'class' =>'form-group', 'method' => 'get'))!!}
                        {!! Form::label('Ingresar codigo de licitacion')!!}
                        {!! Form::text('licitacion') !!}
                        <p>
                        {!! Form::label('Cierre de foro de preguntas')!!}
                        {!!Form::checkbox('opcion', 'foropreguntas', true)!!}
                        </p>
                        <p>
                        {!! Form::label('Dias de cierre de licitacion')!!}
                        {!!Form::checkbox('opcion2', 'dialicitacion', true)!!}
                        </p>
                        <p>
                        {!! Form::label('Dia de adjudicacion de licitacion')!!}
                        {!!Form::checkbox('opcion3', 'adjudicalicitacion', true)!!}
                        </p>
                        
                        {!! Form::submit('Crear') !!}
                        {!! Form::close() !!}

</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection