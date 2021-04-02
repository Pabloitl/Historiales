@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img class="rounded" width="20%" src="https://svgsilh.com/svg_v2/30591.svg" alt="Historiales Médicos">
    </div>

    <div class="text-center mt-5">
        <a href="{{ url('/alumnos') }}"><button class="btn btn-secondary">Alumnos</button></a>
        <a href="{{ url('/medicos') }}"><button class="btn btn-secondary">Médicos</button></a>
        <a href="{{ url('/medicamentos') }}"><button class="btn btn-secondary">Medicamentos</button></a>
        <a href="{{ url('/alergias') }}"><button class="btn btn-secondary">Alergias</button></a>
        <a href="{{ url('/consultas') }}"><button class="btn btn-secondary">Consultas</button></a>
        <a href="{{ url('/reportes') }}"><button class="btn btn-secondary">Reportes</button></a>
    </div>
@endsection
