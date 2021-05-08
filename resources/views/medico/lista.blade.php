@extends('layouts.app')

@section('content')
    <h2 class="text-center">Lista Médicos</h2>

    <div style="text-align: center;" class="mb-3">
        <a href="{{ route('medicos.search') }}"><button class="btn btn-info"><i class="fas fa-search"></i></button></a>
        <div style="width: 40%; display: inline-block;">
            <a href="{{ route('medicos.create') }}"><button class="btn btn-primary btn-block">Nuevo</button></a>
        </div>
    </div>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            <table class="table">
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Campus</th>
                </tr>
                @foreach ($records as $item)
                    <tr>
                        <td><a class="btn btn-secondary" href="{{ route('medicos.show', ['medico' => $item->cedula]) }}">{{ $item->cedula }}</a></td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->campus }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="d-flex">
                <div class="mx-auto">
                    {{ $records->appends(Request::except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
