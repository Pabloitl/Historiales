@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Alumnos</h2>

    <a href="{{ route('alumnos.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

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
@endsection
