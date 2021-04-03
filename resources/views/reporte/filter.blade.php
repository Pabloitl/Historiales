@extends('layouts.app')

@section('content')
    <h2 class="text-center">Reportes</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            <form action="{{ url('/reportes') }}" method="POST">
                @method('POST')
                @csrf

                <div class="form-group">
                    <label for="fecha_inicial">Fecha inicial:</label>
                    <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" value="{{ today()->subMonths(6)->toDateString() }}">
                </div>
                <div class="form-group">
                    <label for="fecha_final">Fecha final:</label>
                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" value="{{ today()->toDateString() }}">
                </div>
                <div style="text-align: center;" class="mt-3">
                    <div style="width: 40%; display: inline-block;">
                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
