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
  
   
        
        <div class="clo-md-2">
          <button id="btnDesplegar" class="btn btn-primary btn.xs" type="Button">Desplegar</button>
         <script type="text/javascript"> 
         $('#btnDesplegar').on('click',function(){      
          echo("hola");
          });
          </script>
        </div>
        <div class="row">
        <div id="chartContainer" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div> 
        
        
        
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">
      
      
      function reporte(){
      Highcharts.chart('chartContainer', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares January, 2015 to May, 2015'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'IE',
            y: 56.33
        }, {
            name: 'Chrome',
            y: 24.03,
            sliced: true,
            selected: true
        }, {
            name: 'Firefox',
            y: 10.38
        }, {
            name: 'Safari',
            y: 4.77
        }, {
            name: 'Opera',
            y: 0.91
        }, {
            name: 'Other',
            y: 0.2
        }]
    }]
});
    </script>
    
    
</div>
                  
                    

                        </div>
                        </div>
                        </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
@endsection