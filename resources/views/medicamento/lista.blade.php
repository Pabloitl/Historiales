@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Medicamentos</h2>

    <a href="{{ route('medicamentos.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Código medicamento</th>
            <th>Nombre</th>
            <th>Cantidad</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-secondary" href="{{ route('medicamentos.show', ['medicamento' => $item->cod_m]) }}">{{ $item->cod_m }}</a></td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->cantidad }}</td>
            </tr>
        @endforeach
    </table>
@endsection
