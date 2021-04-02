@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Alumnos</h2>

    <a href="{{ url('alumnos.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>

    <table class="table">
        <tr>
            <th>Numero de control</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>
        @foreach ($alumnos as $item)
            <tr>
            <td><a class="btn btn-info" href="{{ route('alumnos.show', ['alumno' => $item->no_control]) }}">{{ $item->no_control }}</a></td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->sexo }}</td>
            <td>{{ $item->carrera }}</td>
            </tr>
        @endforeach
    </table>
@endsection
