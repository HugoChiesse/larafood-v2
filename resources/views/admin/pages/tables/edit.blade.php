@extends('adminlte::page')

@section('title', "Editar a Mesa {$table->identify}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}">Mesas</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tables.edit', $table->id) }}">Editar</a></li>
</ol>
    <h1>Editar a Mesa {{ $table->identify }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('tables.update', $table->id) }}" class="form" method="POST">
                @method('put')
                @include('admin.pages.tables._partials.form')
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