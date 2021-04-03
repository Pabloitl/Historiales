@extends('layouts.app')

@section('header')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
    <h2 class="text-center">Reporte</h2>

    <div class="form-group">
        <label for="Fecha_inicial">Fecha inicial:</label>
        <input readonly type="date" class="form-control" id="Fecha_inicial" name="Fecha_inicial" value="{{ $request->fecha_inicial }}">
    </div>
    <div class="form-group">
        <label for="Fecha_final">Fecha final:</label>
        <input readonly type="date" class="form-control" id="Fecha_final" name="Fecha_final" value="{{ $request->fecha_final }}">
    </div>

    <div style="text-align: center;">
        <div style="width: 70%; display: inline-block;" class="text-center">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script>
    var data = JSON.parse(`<?php echo $data; ?>`)
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [{
                label: '# Usos',
                data: data.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
@endsection
