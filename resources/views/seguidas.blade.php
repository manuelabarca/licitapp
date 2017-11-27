@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @php
            $contador = 0;
            @endphp
            @foreach($siguiendo as $seguir)
            @php $contador++; @endphp
            @endforeach
                <div class="panel-heading">Licitaciones seguidas <span class="badge">{{$contador}}</span></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   @foreach($siguiendo as $seguir)
            <ul class="list-group">
            <a href="{{ url('/') }}/buscarL?codigo={{ $seguir->codigo }}" class="list-group-item">{{$seguir->codigo}}</a>
             
@endforeach
</ul>

                        </div>
                        </div>
                        </div>
</div>
@endsection