

@extends('layouts.app')

@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            {{ __('You are logged in!') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          
            <h1 class="m-0">{{ __('Dashboard') }}</h1>
            <div class="d-none d-lg-block">
                <div class="row mt-5">
                    <x-dashboad.card h3Class="login_count" title="Online Connections" :count="$login_count" icon="user-check" color="info" />
                    <x-dashboad.card h3Class="watch_count" title="Active Lines" :count="$active_lines" icon="video" color="success" />
                    <x-dashboad.card h3Class="live_streams" title="Live Streams" :count="$live_streams" icon="chart-line" color="danger" />
                </div>
            </div>
            <div class="d-block d-lg-none">
                <div class="row mt-5">
                    <x-dashboad.mobile_card h3Class="login_count" title="Online Connections" :count="$login_count" icon="user-check" color="info" />
                    <x-dashboad.mobile_card h3Class="watch_count" title="Active Lines" :count="$active_lines" icon="video" color="success" />
                    <x-dashboad.mobile_card h3Class="live_streams" title="Live Streams" :count="$live_streams" icon="chart-line" color="danger" />
                </div>
            </div>     
            <div class="">
                <div class="row mt-5">
                  <div class="col-sm-6">
                 
                    <section>
                        <canvas style="background-color:white;padding:30px;" id="myChart3" style="width:50%;max-width:400px"></canvas>


                    </section>   
                  </div>
                  <div class="col-sm-6">
                    <section>
                        <canvas style="background-color:white;padding:30px;" id="myChart" style="width:50%;max-width:400px"></canvas>


                    </section>
                  </div>
                  <div class="col-sm-6 mt-5">
                    <section>
                        <canvas style="background-color:white;padding:30px;" id="myChart2" style="width:10%;max-width:200px"></canvas>

                    </section>
                  </div>
                  <div class="col-sm-6 mt-5">
                    <section>
                        <canvas style="background-color:white;padding:30px;" id="myChart4" style="width:50%;max-width:450px"></canvas>

                    </section>
                  </div>
                 
                </div>
            </div> 
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        setInterval(() => {
            reloadData()
        }, 3000);
        function reloadData() {
            ajaxHeader()
            
            $.get("views-count",  function(){
                
            })
            .done(function(data){
                $(".watch_count").text(data.active_lines)
                $(".login_count").text(data.login_count)
                $(".live_streams").text(data.live_streams)
                
            })
            .fail(function(error) {
                console.log("failed")
            })
        }
        function ajaxHeader() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = ["red", "green","blue","orange","brown"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                text: "World Wine Production 2018"
                }
            }
        });

        new Chart("myChart2", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                title: {
                display: true,
                text: "World Wide Wine Production"
                }
            }
        });
                    var xyValues = [
            {x:50, y:7},
            {x:60, y:8},
            {x:70, y:8},
            {x:80, y:9},
            {x:90, y:9},
            {x:100, y:9},
            {x:110, y:10},
            {x:120, y:11},
            {x:130, y:14},
            {x:140, y:14},
            {x:150, y:15}
            ];

            new Chart("myChart3", {
            type: "scatter",
            data: {
                datasets: [{
                pointRadius: 4,
                pointBackgroundColor: "rgb(0,0,255)",
                data: xyValues
                }]
            },
            options: {
                legend: {display: false},
                scales: {
                xAxes: [{ticks: {min: 40, max:160}}],
                yAxes: [{ticks: {min: 6, max:16}}],
                }
            }
            });

                        var xValues = [];
            var yValues = [];
            generateData("Math.sin(x)", 0, 10, 0.5);

            new Chart("myChart4", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                fill: false,
                pointRadius: 2,
                borderColor: "rgba(0,0,255,0.5)",
                data: yValues
                }]
            },    
            options: {
                legend: {display: false},
                title: {
                display: true,
                text: "y = sin(x)",
                fontSize: 16
                }
            }
            });
            function generateData(value, i1, i2, step = 1) {
            for (let x = i1; x <= i2; x += step) {
                yValues.push(eval(value));
                xValues.push(x);
            }
            }
                    
    </script>
@endpush