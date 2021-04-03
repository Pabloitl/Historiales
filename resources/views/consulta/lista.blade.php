@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Consultas</h2>

    <a href="{{ route('consultas.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

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
@endsection
