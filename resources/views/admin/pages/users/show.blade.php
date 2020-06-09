@extends('adminlte::page')

@section('title', "Detalhes do Usuário {$user->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.show', $user->id) }}">Detalhes do Usuário</a></li>
</ol>
    <h1>Detalhes do Usuário <strong>{{ $user->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                
                <li><strong>Nome: </strong> {{ $user->name }}</li>
                <li><strong>Email: </strong> {{ $user->email }}</li>
                <li><strong>Empresa: </strong> {{ $user->tenant->name }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('users.destroy', $user->id) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar o Usuário: {{ $user->name }}</button>
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