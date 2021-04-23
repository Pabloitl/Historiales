@extends('layouts.app')

@section('content')
    <h2 class="text-center">Alumno</h2>

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
                        <option value="Hombre"
                            @isset($record)
                                @if($record->sexo == "Hombre")
                                    selected
                                @endif
                            @endisset
                        >Hombre</option>
                        <option value="Mujer"
                            @isset($record)
                                @if($record->sexo == "Mujer")
                                    selected
                                @endif
                            @endisset
                        >Mujer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Carrera">Carrera:</label>
                    <input type="text" class="form-control" id="Carrera" name="Carrera" value="{{ $record['carrera'] ?? '' }}">
                </div>
                <div style="text-align: center;" class="mt-3">
                    <div style="width: 40%; display: inline-block;">
                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                    </div>
                </div>
            </form>
            @isset($record)
                <form action="{{ route('alumnos.destroy', ['alumno' => $record['no_control']]) }}" method="POST">
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
