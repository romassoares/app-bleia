@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<h1 class="m-0 text-dark">Home</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @php
                dd($tot_mes_a_mes);
                @endphp
                <!-- <canvas id="myChart"></canvas> -->
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- @tot_mes_a_mes -->
<!-- <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['dezembro', 'janeiro', 'fevereiro', 'marco', 'abril', 'maio'],
            datasets: [{
                label: 'Total dízimos p/ mês',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> -->
@endsection