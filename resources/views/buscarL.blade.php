@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @foreach ($licitacion->Listado as $infolicitacion)
                <div class="panel-heading">Comparar con: 
                 {!! Form::open(array('url' => 'comparando', 'class' =>'form-group', 'method' => 'get'))!!}
                  {!! Form::text('codigo') !!}
                   {{ Form::hidden('codigoExterno', $infolicitacion->CodigoExterno) }}
                   {{ Form::hidden('nombre', $infolicitacion->Nombre) }}
                   {{ Form::hidden('estado', $infolicitacion->CodigoEstado) }}
                   {!! Form::submit('Comparar') !!}
                   {{ Form::hidden('codigoorganismo', $infolicitacion->Comprador->CodigoOrganismo) }}
                   {{ Form::hidden('nombreorganismo', $infolicitacion->Comprador->NombreOrganismo) }}
                   {{ Form::hidden('contacto', $infolicitacion->EmailResponsableContrato) }}
                   {{ Form::hidden('diascierre', $infolicitacion->DiasCierreLicitacion) }}
                   {{ Form::hidden('montoestimado', $infolicitacion->MontoEstimado) }}
                   {{ Form::hidden('cantidadproductos', $infolicitacion->Items->Cantidad) }}
                   {{ Form::hidden('reclamos', $infolicitacion->CantidadReclamos) }}
                   @foreach($infolicitacion->Items->Listado as $item)
                   {{ Form::hidden('descripcion', $item->Descripcion) }}
                   @endforeach
                   {!! Form::close() !!}
                  
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
       
        
            <ul class="list-group">
            <li class="list-group-item list-group-item-info">Informacion de licitacion: {{$infolicitacion->CodigoExterno}} </li>
            <li class="list-group-item">Nombre<span class="badge" id="nombre">{{ $infolicitacion->Nombre }}</span></li>
            @php
          switch ($infolicitacion->CodigoEstado) {
              case 5:
              echo '<li class="list-group-item .list-group-item-success">Estado<span class="badge">Publicada</span></li>';
            break;
            case 6:
          echo '<li class="list-group-item ">Estado<span class="badge">Cerrada</span></li>';
          break;
          case 7:
          echo '<li class="list-group-item">Estado<span class="badge">Desierta</span></li>';
          break;
          case 8:
          echo '<li class="list-group-item">Estado<span class="badge">Adjudicada</span></li>';
          break;
          case 18:
          echo '<li class="list-group-item">Estado<span class="badge">Revocada</span></li>';
          break;
          case 19:
          echo '<li class="list-group-item">Estado<span class="badge">Suspendida</span></li>';
                }
@endphp


               <li class="list-group-item">Comprador</li>
               <li class="list-group-item">Codigo de organismo publico<span class="badge">{{ $infolicitacion->Comprador->CodigoOrganismo }}</span></li>
               <li class="list-group-item">Nombre de organismo publico<span class="badge">{{ $infolicitacion->Comprador->NombreOrganismo }}</span></li>
               <li class="list-group-item">RUT de organismo publico<span class="badge">{{ $infolicitacion->Comprador->RutUnidad }}</span></li>
               <li class="list-group-item">Fechas de la licitacion</li>
               <li class="list-group-item">Fecha de inicio <span class="badge">{{ date('d F Y', strtotime($infolicitacion->Fechas->FechaInicio)) }}</span></li>
               <li class="list-group-item">Fecha de cierre <span class="badge">{{ date('d F Y', strtotime($infolicitacion->Fechas->FechaCierre))  }}</span></li>
               <li class="list-group-item">Dias para que cierre <span class="badge">{{ $infolicitacion->DiasCierreLicitacion }}</span></li>
               <li class="list-group-item list-group-item-info">Dinero</li>
               @if($infolicitacion->MontoEstimado == null)
               <li class="list-group-item">Valor estimado de licitacion<span class="badge">No informo monto</span></li>
               @else
               <li class="list-group-item">Valor estimado de licitacion<span class="badge">{{ number_format($infolicitacion->MontoEstimado) }}</span></li>
               @endif
               <li class="list-group-item list-group-item-info">Productos</li>
               <li class="list-group-item">Cantidad de productos <span class="badge">{{ $infolicitacion->Items->Cantidad }}</span></li>
               @endforeach
               <li class="list-group-item list-group-item-info">Nombre de productos</li>
               
               @foreach($infolicitacion->Items->Listado as $nombreproducto)
              <li class="list-group-item"> {{ $nombreproducto->NombreProducto}}<span class="badge">{{ $nombreproducto->Cantidad }}</span></li>
               @endforeach
               <li class="list-group-item list-group-item-info">Otros datos</li>
               <li class="list-group-item">Link a mercadopublico<span class="badge"><a href=" https://www.mercadopublico.cl/Procurement/Modules/RFB/DetailsAcquisition.aspx?idlicitacion={{$infolicitacion->CodigoExterno}}">Ver</a></span></li>
               <li class="list-group-item">Cantidad de reclamos<span class="badge">{{ $infolicitacion->CantidadReclamos }}</span></li>
               </ul>
  

                  
                    

                        </div>
                        </div>
                        </div>
</div>

@endsection