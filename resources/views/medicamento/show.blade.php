@extends('layouts.app')

@section('content')
    <h2 class="text-center">Medicamento</h2>

    <div class="form-group">
        <label for="Cod_M">Código medicamento:</label>
        <input type="number" class="form-control" id="Cod_M" name="Cod_M" value="{{ $record['cod_m'] ?? '' }}"
        @isset($record)
            readonly
        @endisset>
    </div>

    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input readonly type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['nombre'] ?? '' }}">
    </div>

    <div class="form-group">
        <label for="Cantidad">Cantidad:</label>
        <input readonly type="number" class="form-control" id="Cantidad" name="Cantidad" value="{{ $record['cantidad'] ?? '' }}">
    </div>

    <a class="btn btn-primary btn-block" href="{{ route('medicamentos.edit', ['medicamento' => $record['cod_m']]) }}">Editar</a>
@endsection
