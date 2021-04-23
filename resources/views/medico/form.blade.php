@extends('layouts.app')

@section('content')
    <h2 class="text-center">Médico</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            @if ($errors->any())
                <div class="alert alert-danger" style="text-align: left;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <form action="{{ url('medicos/' . ($record['cedula'] ?? '')) }}" method="POST">
        @if (isset($record))
            @method('PATCH')
        @else
            @method('POST')
        @endif

        @csrf

        <div class="form-group">
            <label for="Cedula">Cédula:</label>
            <input type="number" class="form-control" id="Cedula" name="Cedula" value="{{ $record['cedula'] ?? '' }}"
            @isset($record)
                readonly
            @endisset>
        </div>

        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['nombre'] ?? '' }}">
        </div>

        <div class="form-group">
            <label for="Campus">Campus</label>
            <input type="number" class="form-control" id="Campus" name="Campus" value="{{ $record['campus'] ?? '' }}">
        </div>

        <div style="text-align: center;" class="mt-3">
            <div style="width: 40%; display: inline-block;">
                <button type="submit" class="btn btn-success btn-block">Enviar</button>
            </div>
        </div>
    </form>
    @isset($record)
        <form action="{{ route('medicos.destroy', ['medico' => $record['cedula']]) }}" method="POST">
            @method('DELETE')

            @csrf
            <div style="text-align: center;" class="mt-3">
                <div style="width: 40%; display: inline-block;">
                    <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                </div>
            </div>
        </form>
    @endisset
        </div>
    </div>
@endsection
