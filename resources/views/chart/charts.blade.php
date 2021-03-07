@extends('layouts.app')

@section('content')
<div class="container">


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Marcas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @if ($consultas->isNotEmpty())

        <section class="content">

            <div class="container-fluid">


                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Seleciona tu marca</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="height:230px; min-height:230px"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </section>
        @php
                $contador=0;//montos
                $marcas=array();//ventas
            foreach ($consultas as $constulta){
                $contador=$contador+1;
                $marcas[]=$constulta->name;

            }
            $datosx=json_encode($marcas);
        @endphp

        @else
        <br><br>
        <div class="container m-5">
            <div class="alert alert-primary" role="alert">
                <p class="text-center m-3"> Ups! no hay registros 😥</p>
            </div>
        </div>
        @endif
    </div>


  
    <!-- /.content -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</div>

@if ($consultas->isNotEmpty())
<script type="text/javascript">
    function crearCadenaLineal(json) {
        var parsed = JSON.parse(json);
        var arr = [];

        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }

</script>



<script>

    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */
contador = ('<?php echo $contador ?>');
 datosx = crearCadenaLineal('<?php echo $datosx ?>');
 //console.log(datosx);
 
        var colores = [];
        var partes =[];

        for (i = 0; i < contador; i++) {
            var color = "#";
            for (k = 0; k < 3; k++) {
                color += ("0" + (Math.random() * 256 | 0).toString(16)).substr(-2);
            }
            colores[i] = color;
            partes[i]=100;
        }

        ///console.log(partes);
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: datosx,
            datasets: [{
                data: partes,
                backgroundColor: colores,
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- FIN CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.

    })

</script>
@endif
@endsection
