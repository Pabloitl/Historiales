@extends('layouts.app')

@section('content')
    <h2 class="text-center">Buscar Consulta</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            <form action="{{ route('consultas.search') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="no_control">Numero de control:</label>
                    <input type="text" class="form-control" id="no_control" name="no_control">
                </div>

                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <input type="number" class="form-control" id="cedula" name="cedula">
                </div>

                <div class="form-group">
                    <label for="fecha_consulta">Fecha de Consulta:</label>
                    <input type="date" class="form-control" id="fecha_consulta" name="fecha_consulta">
                </div>

                <div style="text-align: center;" class="mt-3">
                    <div style="width: 40%; display: inline-block;">
                        <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
