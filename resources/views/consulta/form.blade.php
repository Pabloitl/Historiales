@extends('layouts.app')

@section('content')
    <h2 class="text-center">Consulta</h2>

    <form action="{{ url('consultas/' . ($record['no_consulta'] ?? '')) }}" method="POST">
        @if (isset($record))
            @method('PATCH')
        @else
            @method('POST')
        @endif

        @csrf

        <div class="form-group">
            @if (isset($record))
                <label for="No_Consulta">Numero Consulta:</label>
                <input class="form-control" id="No_Consulta" name="No_Consulta" value="{{ $record['no_consulta'] ?? '' }}"
                    @isset($record)
                        readonly
                    @endisset>
            @endif
        </div>
        <div class="form-group">
            <label for="No_Control">Numero Control:</label>
            <input type="number" class="form-control" id="No_Control" name="No_Control" value="{{ $record['no_control'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Cedula">Cedula:</label>
            <input type="number" class="form-control" id="Cedula" name="Cedula" value="{{ $record['cedula'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Fecha_consulta">Fecha de Consulta:</label>
            <input type="date" class="form-control" id="Fecha_consulta" name="Fecha_consulta" value="{{ $record['fecha_consulta'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción:</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{ $record['descripcion'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Cod_M">Código Medicamento:</label>
            <input type="number" class="form-control" id="Cod_M" name="Cod_M" value="{{ $record['cod_m'] ?? '' }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>

    @isset($record)
        <form action="{{ route('consultas.destroy', ['consulta' => $record['no_consulta']]) }}" method="POST">
            @method('DELETE')

            @csrf
            <div class="text-center">
                <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
            </div>
        </form>
    @endisset
@endsection
