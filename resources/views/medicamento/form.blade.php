@extends('layouts.app')

@section('content')
    <h2 class="text-center">Medicamento</h2>

    <form action="{{ url('medicamentos/' . ($record['cod_m'] ?? '')) }}" method="POST">
        @if (isset($record))
            @method('PATCH')
        @else
            @method('POST')
        @endif

        @csrf

        <div class="form-group">
            <label for="Cod_M">Código medicamento:</label>
            <input type="number" class="form-control" id="Cod_M" name="Cod_M" value="{{ $record['cod_m'] ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>

        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['nombre'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="Cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="Cantidad" name="Cantidad" value="{{ $record['cantidad'] ?? '' }}">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>
    @isset($record)
        <form action="{{ route('medicamentos.destroy', ['medicamento' => $record['cod_m']]) }}" method="POST">
            @method('DELETE')

            @csrf
            <div class="text-center">
                <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
            </div>
        </form>
    @endisset
@endsection
