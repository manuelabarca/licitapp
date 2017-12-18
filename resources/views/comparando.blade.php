@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
             
                      <div class="panel-heading">Comparacion de licitaciones: {{$codigo}} | {{$codigo2}} </div>

                    <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                  <table id="lista" class="table table-striped">
                    <tr>
                    <th></th>
                    <th>Licitacion: {{$codigo}}</th>
                    <th>Licitacion: {{$codigo2}}</th>
                    </tr>
                    <tr>
                    <td>Nombre</td>
                    <td>{{$nombre}}</td>
                    <td>{{$nombre2}}</td>
                    </tr>
                    <tr>
                    <td>Estado</td>
                    @if($estado < $estado2)
                    <td class="success">Publicada - ESTA ES UNA OPORTUNIDADE DE NEGOCIO!</td>
                    <td class="error">{{$estado2}}
                    @elseif($estado == $estado2)
                    <td class="success">Publicada - ESTA ES UNA OPORTUNIDADE DE NEGOCIO!</td>
                    <td class="success">Publicada - ESTA ES UNA OPORTUNIDADE DE NEGOCIO!</td>
                    @else
                    <td class="error">{{$estado}}</td>
                    <td class="success">Publicada - ESTA ES UNA OPORTUNIDAD DE NEGOCIO!</td>
                    @endif
                    </tr>
                    <tr>
                    <td>Monto estimado</td>
                    @if($montoestimado > $montoestimado2)
                    <td class="success">${{$montoestimado}}</td>
                    <td class="error">${{$montoestimado2}}
                    @elseif($montoestimado == $montoestimado2)
                    <td class="success">${{$montoestimado}}</td>
                    <td class="success">${{$montoestimado2}}</td>
                    @else
                    <td class="error">${{$montoestimado}}</td>
                    <td class="success">${{$montoestimado2}}</td>
                    @endif
                 
                    </tr>
                    <tr>
                    <td>Empresa encargada</td>               
                    <td>{{$nombreorga}}</td>
                    <td>{{$nombreorga2}}</td>
                    </tr>
                    <tr>
                    <td>Correo responsable</td>               
                    <td>{{$contacto}}</td>
                    <td>{{$contacto2}}</td>
                    </tr>
                    <tr>
                    <td>Codigo de empresa encargada</td>
                    <td><a href="http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?CodigoOrganismo={{$codigoorga}}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136">{{$codigoorga}}</a></td>
                    <td><a href="http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?CodigoOrganismo={{$codigoorga2}}&ticket=F103BA35-2ECC-4475-8E66-43D4B22E4136">{{$codigoorga2}}</a></td>
                    </tr>
                    <tr>
                    <td>Descripcion compra</td>               
                    <td>{{$descripcionItems}}</td>
                    <td>{{$descripcionItems2}}</td>
                    </tr>
                    <tr>
                    <td>Cantidad de productos/servicios</td>               
                    <td>{{$cantidadproducto}}</td>
                    <td>{{$cantidadproducto2}}</td>
                    </tr>
                    <tr>
                    <td>Monto por producto/servicio</td>
                    @if($montoestimado/$cantidadproducto > $montoestimado2/$cantidadproducto2)
                    <td class="success">${{number_format($montoestimado/$cantidadproducto, 0, '', '')}}</td>
                    <td class="error">${{number_format($montoestimado2/$cantidadproducto2, 0, '', '')}} </td>
                    @elseif($montoestimado/$cantidadproducto == $montoestimado2/$cantidadproducto2)
                    <td class="success">${{number_format($montoestimado/$cantidadproducto, 0, '', '')}}</td>
                    <td class="success">${{number_format($montoestimado2/$cantidadproducto2, 0, '', '')}}</td>
                    @else
                    <td class="error">${{number_format($montoestimado/$cantidadproducto, 0, '', '')}}</td>
                    <td class="success">${{number_format($montoestimado2/$cantidadproducto2, 0, '', '')}}</td>
                    @endif
                 
                    </tr>
                    <tr>
                    <td>Dias para cierre</td>               
                    <td>{{$diascierre}}</td>
                    <td>{{$diascierre2}}</td>
                    </tr>
                    <tr>
                    <td>Reclamos empresa</td> 
                    @if($reclamos > $reclamos)
                    <td>{{$reclamos}}</td>
                    <td class="error">{{$reclamos2}}
                    @elseif($reclamos == $reclamos2)
                    <td class="error">{{$reclamos}}</td>
                    <td class="error">{{$reclamos2}}</td>
                    @else
                    <td class="error">{{$reclamos}}</td>
                    <td>{{$reclamos2}}</td>
                    @endif              
                    </tr>
                 </table>
                        </div>
                        <div id="montoestimado"></div>
                        <div></div>
                        <div id="cantidadproducto"></div>
                        <div></div>
                        <div id="montoproducto"></div>
                        <div></div>
                        <div id="reclamos"></div>
                        </div>
                        </div>
</div>
@include ('footer') 
@endsection