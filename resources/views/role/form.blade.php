@extends('layouts.app')

@section('content')
    <h2 class="text-center">Roles</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            @isset($success)
                <div class="alert alert-success">
                    Cambio exitoso!
                </div>
            @endisset
            <form action="{{ url('roles/') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <select id="pet-select" class="form-control" name="usuario">
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="accion">Acción:</label>
                    <select id="pet-select" class="form-control" name="accion">
                        <option value="Dar">Dar</option>
                        <option value="Quitar">Quitar</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select id="pet-select" class="form-control" name="rol">
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="text-align: center;" class="mt-3">
                    <div style="width: 40%; display: inline-block;">
                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                    </div>
                </div>
            </form>
            <table class="table mt-5">
                <tr>
                    <th>Email</th>
                    @foreach($roles as $role)
                        <th>{{ $role->name }}</th>
                    @endforeach
                </tr>
                @foreach($usuarios as $item)
                    <tr>
                    <td>{{ $item->email }}</td>
                    @foreach($roles as $role)
                        <td><input type="checkbox" class="form-check-box" disabled
                            @if($item->hasRole($role->name))
                                checked
                            @endif
                        ></td>
                    @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
