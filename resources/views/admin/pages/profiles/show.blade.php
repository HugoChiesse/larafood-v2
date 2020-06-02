@extends('adminlte::page')

@section('title', "Detalhes do Perfil {$profile->name}")

@section('content_header')
    <h1>Detalhes do Perfil <strong>{{ $profile->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <ul>
                
                <li><strong>Nome: </strong> {{ $profile->name }}</li>
                <li><strong>Descrição: </strong> {{ $profile->description }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('profiles.destroy', $profile->id) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar o Plano: {{ $profile->name }}</button>
            </form>
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}