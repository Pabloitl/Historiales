@extends('layouts.app')

@section('content')
    <h2 class="text-center">Buscar Medicamento</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            <form action="{{ route('medicamentos.filter') }}" method="GET">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
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
