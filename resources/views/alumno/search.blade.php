@extends('layouts.app')

@section('content')
    <h2 class="text-center">Buscar Alumno</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            <form action="{{ route('alumnos.search') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="no_control">Numero de control:</label>
                    <input type="text" class="form-control" id="no_control" name="no_control">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="pet-select" class="form-control" name="sexo">
                        <option value=""></option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="carrera">Carrera:</label>
                    <input type="text" class="form-control" id="carrera" name="carrera">
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
