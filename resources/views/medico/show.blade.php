@extends('layouts.app')

@section('content')
    <h2 class="text-center">Médico</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
    <div class="form-group">
        <label for="Cedula">Cédula:</label>
        <input readonly type="number" class="form-control" id="Cedula" name="Cedula" value="{{ $record['cedula'] ?? '' }}"
        @isset($record)
            readonly
        @endisset>
    </div>
    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input readonly type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['nombre'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="Campus">Campus</label>
        <input readonly type="number" class="form-control" id="Campus" name="Campus" value="{{ $record['campus'] ?? '' }}">
    </div>

    <div style="text-align: center;" class="mt-3">
        <div style="width: 40%; display: inline-block;">
            <a class="btn btn-primary btn-block" href="{{ route('medicos.edit', ['medico' => $record['cedula']]) }}">Editar</a>
        </div>
    </div>
        </div>
    </div>
@endsection
