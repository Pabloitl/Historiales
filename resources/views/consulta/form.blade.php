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
                <input class="form-control" id="No_Consulta" name="No_Consulta" value="{{ $record['no_consulta'] ?? '' }}" readonly>
            @endif
        </div>
        <div class="form-group">
            <label for="No_Control">Numero Control:</label>
            <select id="pet-select" class="form-control" name="No_Control">
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->no_control }}"
                        @isset($record)
                            @if($alumno->no_control == $record->no_control)
                                selected
                            @endif
                        @endisset
                    >{{ $alumno->no_control }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Cedula">Médico:</label>
            <select id="pet-select" class="form-control" name="Cedula" value="{{ $record['cedula'] ?? '' }}">
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->cedula }}"
                        @isset($record)
                            @if($medico->cedula == $record->cedula)
                                selected
                            @endif
                        @endisset
                    >{{ $medico->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha_consulta">Fecha de Consulta:</label>
            <input type="date" class="form-control" id="Fecha_consulta" name="Fecha_consulta" value="{{ $record['fecha_consulta'] ?? Carbon\Carbon::now()->toDateString() }}">
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción:</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion">{{ $record['descripcion'] ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="Cod_M">Medicamento:</label>
            <select id="pet-select" class="form-control" name="Cod_M" value="{{ $record['cod_m'] ?? '' }}">
                @foreach ($medicamentos as $medicamento)
                    <option value="{{ $medicamento->cod_m }}"
                        @isset($record)
                            @if($medicamento->cod_m == $record->cod_m)
                                selected
                            @endif
                        @endisset
                    >{{ $medicamento->nombre }}</option>
                @endforeach
            </select>
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
