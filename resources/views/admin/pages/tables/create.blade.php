@extends('adminlte::page')

@section('title', 'Cadastrar Nova Mesa')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}">Mesa</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tables.create') }}">Cadastrar</a></li>
</ol>
<h1>Cadastrar Nova Mesa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('tables.store') }}" class="form" method="POST">
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