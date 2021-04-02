@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Médicos</h2>

    <a href="{{ route('medicos.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Campus</th>
        </tr>
        @foreach ($records as $item)
            <tr>
            <td><a class="btn btn-secondary" href="{{ route('medicos.show', ['medico' => $item->cedula]) }}">{{ $item->cedula }}</a></td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->campus }}</td>
            </tr>
        @endforeach
    </table>
@endsection
