@extends('layouts.app')

@section('content')
    <h2 class="text-center">Reportes</h2>

    <form action="{{ url('/reportes') }}" method="POST">
        @method('POST')
        @csrf

        <div class="form-group">
            <label for="fecha_inicial">Fecha inicial:</label>
            <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial">
        </div>
        <div class="form-group">
            <label for="fecha_final">Fecha final:</label>
            <input type="date" class="form-control" id="fecha_final" name="fecha_final">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </form>
@endsection
