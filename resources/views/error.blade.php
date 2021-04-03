@extends('layouts.app')

@section('content')
    <h2 class="text-center">Ah ocurrido un error!!</h2>

    <div style="text-align: center;">
        <div style="width: 50%; display: inline-block;">
            <div class="alert alert-success">
                {{ $error }}
            </div>
        </div>
    </div>
@endsection
