@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Alumnos</h2>

    <div style="text-align: center;" class="mb-3">
        <div style="width: 40%; display: inline-block;">
            <a href="{{ route('alumnos.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>
        </div>
    </div>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            <table class="table">
                <tr>
                    <th>Numero de control</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Carrera</th>
                </tr>
                @foreach ($records as $item)
                    <tr>
                    <td><a class="btn btn-secondary" href="{{ route('alumnos.show', ['alumno' => $item->no_control]) }}">{{ $item->no_control }}</a></td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->sexo }}</td>
                    <td>{{ $item->carrera }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
