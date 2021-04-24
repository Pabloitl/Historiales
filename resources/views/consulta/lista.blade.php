@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Consultas</h2>

    <div style="text-align: center;" class="mb-3">
        <a href="{{ route('consultas.search') }}"><button class="btn btn-info"><i class="fas fa-search"></i></button></a>
        <div style="width: 40%; display: inline-block;">
            <a href="{{ route('consultas.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>
        </div>
    </div>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
    <table class="table">
        <tr>
            <th>Numero Consulta</th>
            <th>Numero Control</th>
            <th>Médico</th>
            <th>Medicamento</th>
            <th>Fecha Consulta</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-secondary" href="{{ route('consultas.show', ['consulta' => $item->no_consulta]) }}">{{ $item->no_consulta }}</a></td>
            <td>{{ $item->no_control }}</td>
            <td>{{ App\Models\Medico::find($item->cedula)->nombre }}</td>
            <td>{{ App\Models\Medicamento::find($item->cod_m)->nombre }}</td>
            <td>{{ $item->fecha_consulta }}</td>
            </tr>
        @endforeach
    </table>
        </div>
    </div>
@endsection
