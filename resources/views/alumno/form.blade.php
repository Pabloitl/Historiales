@extends('layouts.app')

@section('content')
    <h2 class="text-center">Alumno</h2>

    <form action="{{ url('alumnos/' . ($record['no_control'] ?? '')) }}" method="POST">
        @if (isset($record))
            @method('PATCH')
        @else
            @method('POST')
        @endif

        @csrf

        <div class="form-group">
            <label for="No_Control">Numero de control:</label>
            <input type="text" class="form-control" id="No_Control" name="No_Control" value="{{ $record['no_control'] ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['nombre'] ?? '' }}">
        </div>

        <div class="form-group">
            <label for="Sexo">Sexo:</label>
            <select id="pet-select" class="form-control" name="Sexo" value="{{ $record['sexo'] ?? '' }}">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Carrera">Carrera:</label>
            <input type="text" class="form-control" id="Carrera" name="Carrera" value="{{ $record['carrera'] ?? '' }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>
    @isset($record)
        <form action="{{ route('alumnos.destroy', ['alumno' => $record['no_control']]) }}" method="POST">
            @method('DELETE')

            @csrf
            <div class="text-center">
                <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
            </div>
        </form>
    @endisset
@endsection
