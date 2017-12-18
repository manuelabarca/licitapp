  $(function () { 
        var data_click = [publicadas,adjudicadas,cerradas, desiertas];

    $('#container').highcharts({
        chart: {
            type: 'column'

        },
        title: {
            text: 'Licitaciones del dia'
        },
        xAxis: {
            categories: ['Publicadas','Adjudicadas','Cerradas', 'Abandonadas']

        },
        yAxis: {
            title: {
                text: 'Cantidad de licitaciones'
            }
        },
        series: [{
            name: 'Cantidad de licitaciones',
            data: data_click
            
        }]
    });

});

  $(function () { 
        var data_click = [montoestimado1,montoestimado2];

    $('#montoestimado').highcharts({
        chart: {
            type: 'column'

        },
        title: {
            text: 'Monto estimado a pagar'
        },
        xAxis: {
            categories: [codigoLicitacion1, codigoLicitacion2]

        },
        yAxis: {
            title: {
                text: 'Monto'
            }
        },
        series: [{
            name: 'Montos a pagar',
            data: data_click
            
        }]
    });

});

  $(function () { 
        var data_click = [producto1,producto2];

    $('#cantidadproducto').highcharts({
        chart: {
            type: 'column'

        },
        title: {
            text: 'Cantidad de productos'
        },
        xAxis: {
            categories: [codigoLicitacion1, codigoLicitacion2]

        },
        yAxis: {
            title: {
                text: 'Cantidad'
            }
        },
        series: [{
            name: 'Cantidad de productos ofrecidos',
            data: data_click

            
        }]
    });

});

  $(function () { 
        var data_click = [montoproducto1,montoproducto2];

    $('#montoproducto').highcharts({
        chart: {
            type: 'column'

        },
        title: {
            text: 'Monto por cada producto'
        },
        xAxis: {
            categories: [codigoLicitacion1, codigoLicitacion2]

        },
        yAxis: {
            title: {
                text: 'Cantidad'
            }
        },
        series: [{
            name: 'Montos por productos ofrecidos',
            data: data_click

            
        }]
    });

});

$(function () { 
        var data_click = [reclamos1,reclamos2];

    $('#reclamos').highcharts({
        chart: {
            type: 'column'

        },
        title: {
            text: 'Reclamos'
        },
        xAxis: {
            categories: [empresa1, empresa2]

        },
        yAxis: {
            title: {
                text: 'Cantidad'
            }
        },
        series: [{
            name: 'Reclamos a la empresa que ofrece la licitacion',
            data: data_click

            
        }]
    });

});


