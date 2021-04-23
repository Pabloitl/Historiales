@extends('layouts.app')

@section('content')
    <h2 class="text-center">Medicamento</h2>

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
    <form action="{{ url('medicamentos/' . ($record['nombre'] ?? '')) }}" method="POST">
        @if (isset($record))
            @method('PATCH')
        @else
            @method('POST')
        @endif

        @csrf

        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $record['nombre'] ?? '' }}"
            @isset($record)
                readonly
            @endisset
            >
        </div>

        <div class="form-group">
            <label for="Cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="Cantidad" name="Cantidad" value="{{ $record['cantidad'] ?? '' }}">
        </div>

        <div style="text-align: center;" class="mt-3">
            <div style="width: 40%; display: inline-block;">
                <button type="submit" class="btn btn-success btn-block">Enviar</button>
            </div>
        </div>
    </form>
    @isset($record)
        <form action="{{ route('medicamentos.destroy', ['medicamento' => $record['nombre']]) }}" method="POST">
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
