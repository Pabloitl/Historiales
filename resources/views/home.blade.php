@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img class="rounded" width="20%" src="https://svgsilh.com/svg_v2/30591.svg" alt="Historiales Médicos">
    </div>

    <div class="text-center mt-5">
        @can('manipular alumnos')
            <a href="{{ route('alumnos.index') }}"><button class="btn btn-outline-secondary">Alumnos</button></a>
        @endcan
        @can('manipular medicos')
            <a href="{{ route('medicos.index') }}"><button class="btn btn-outline-secondary">Médicos</button></a>
        @endcan
        @can('manipular medicamentos')
            <a href="{{ route('medicamentos.index') }}"><button class="btn btn-outline-secondary">Medicamentos</button></a>
        @endcan
        @can('manipular consultas')
            <a href="{{ route('consultas.index') }}"><button class="btn btn-outline-secondary">Consultas</button></a>
        @endcan
        @can('ver reportes')
            <a href="{{ route('reportes.index') }}"><button class="btn btn-outline-secondary">Reportes</button></a>
        @endcan
        @can('manipular roles')
            <a href="{{ route('roles.index') }}"><button class="btn btn-outline-secondary">Roles</button></a>
        @endcan
    </div>
@endsection
