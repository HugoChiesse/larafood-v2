@extends('adminlte::page')

@section('title', "Detalhes da Permissão {$permission->name}")

@section('content_header')
    <h1>Detalhes da Permissão <strong>{{ $permission->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <ul>
                
                <li><strong>Nome: </strong> {{ $permission->name }}</li>
                <li><strong>Descrição: </strong> {{ $permission->description }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('permissions.destroy', $permission->id) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar o Plano: {{ $permission->name }}</button>
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