@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
<h1>Cadastrar Nova Permissão <a href="{{ route('permissions.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
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