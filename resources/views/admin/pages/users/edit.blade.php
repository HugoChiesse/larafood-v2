@extends('adminlte::page')

@section('title', "Editar o Usuário {$user->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.edit', $user->id) }}">Editar</a></li>
</ol>
    <h1>Editar o Usuário {{ $user->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                @method('put')
                @include('admin.pages.users._partials.form')
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