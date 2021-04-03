@extends('layouts.app')

@section('content')
    <h2 class="text-center">Consulta</h2>

    <div class="form-group">
            <label for="No_Consulta">Numero Consulta:</label>
            <input readonly class="form-control" id="No_Consulta" name="No_Consulta" value="{{ $record['no_consulta'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="No_Control">Numero Control:</label>
        <input readonly type="text" class="form-control" id="No_Control" name="No_Control" value="{{ $record['no_control'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="Cedula">Médico:</label>
        <input readonly type="text" class="form-control" id="Cedula" name="Cedula" value="{{ $medico['nombre'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="Fecha_consulta">Fecha de Consulta:</label>
        <input readonly type="date" class="form-control" id="Fecha_consulta" name="Fecha_consulta" value="{{ $record['fecha_consulta'] ?? '' }}">
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripción:</label>
        <textarea readonly class="form-control" id="Descripcion" name="Descripcion">{{ $record['descripcion'] ?? '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="Cod_M">Medicamento:</label>
        <input readonly type="text" class="form-control" id="Cod_M" name="Cod_M" value="{{ $medicamento['nombre'] ?? '' }}">
    </div>

    <a class="btn btn-primary btn-block" href="{{ route('consultas.edit', ['consulta' => $record['no_consulta']]) }}">Editar</a>
@endsection
