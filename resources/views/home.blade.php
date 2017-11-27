@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">¿Que esta pasando hoy con las licitaciones?</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <span>Licitaciones</span>
                  <ul class="list-group">
  <li class="list-group-item">Han cambiado de estado<span class="badge">{{ $licitaciones->Cantidad }}</span></li>


                   <!--Contador publicadas -->
                  <?php $contadorPublicadas = 0;?>
                  @foreach($licitaciones->Listado as $licitacion)
                  @if($licitacion->CodigoEstado == 5)
                  <?php $contadorPublicadas++; ?>                 
                  @endif                  
                  @endforeach
                  <li class="list-group-item">Se han publicado<span class="badge">{{$contadorPublicadas}}</span></li> 
                 
                   <!--Contador cerradas -->
                   <?php $contadorCerradas = 0;?>
                  @foreach($licitaciones->Listado as $licitacion)
                  @if($licitacion->CodigoEstado == 6)
                  <?php $contadorCerradas++; ?>                 
                  @endif                  
                  @endforeach
                    <li class="list-group-item">Se han cerrado<span class="badge">{{$contadorCerradas}}</span></li> 
                 
                   <!--Contador adjudicadas-->
                   <?php $contadorAdjudicadas = 0;?>
                  @foreach($licitaciones->Listado as $licitacion)
                  @if($licitacion->CodigoEstado == 8)
                  <?php $contadorAdjudicadas++; ?>                 
                  @endif                  
                  @endforeach
                  <li class="list-group-item">Se han adjudicado<span class="badge">{{$contadorAdjudicadas}}</span></li> 
                  </ul>
                  
                  
                   <!--Informacion de ordenes de compra-->
                  <span>Ordenes de compra</span>
                  <ul class="list-group">
                   <li class="list-group-item">Han cambiado de estado<span class="badge">{{ $ordenes->Cantidad }}</span></li> 
                 
                  <?php $contadorEnviado = 0;?>
                  @foreach($ordenes->Listado as $orden)
                  @if($orden->CodigoEstado == 4)
                  <?php $contadorEnviado++; ?>                 
                  @endif                  
                  @endforeach
                   <li class="list-group-item">Se han enviado a proveedor<span class="badge">{{$contadorEnviado}}</span></li> 
                 </ul>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
