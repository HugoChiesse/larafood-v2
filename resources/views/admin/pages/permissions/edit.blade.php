@extends('adminlte::page')

@section('title', "Editar a Permissão {$permission->name}")

@section('content_header')
    <h1>Editar a Permissão {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @method('put')
                @include('admin.pages.permissions._partials.form')
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