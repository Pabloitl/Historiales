@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Medicamentos</h2>

    <div style="text-align: center;" class="mb-3">
        <div style="width: 40%; display: inline-block;">
            <a href="{{ route('medicamentos.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>
        </div>
    </div>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
    <table class="table">
        <tr>
            <th>Código medicamento</th>
            <th>Nombre</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-secondary" href="{{ route('medicamentos.show', ['medicamento' => $item->cod_m]) }}">{{ $item->cod_m }}</a></td>
            <td>{{ $item->nombre }}</td>
            </tr>
        @endforeach
    </table>
        </div>
    </div>
@endsection
