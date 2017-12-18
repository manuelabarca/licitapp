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
 @php
 echo "<p>$fechaForo</p>";
 echo "<p>$fechaDias</p>";
 echo "<p>$fechaAdjudicada</p>";
 @endphp

</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection