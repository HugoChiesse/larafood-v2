@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.create') }}">Cadastrar</a></li>
</ol>
<h1>Cadastrar Novo Produto <a href="{{ route('products.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @include('admin.pages.products._partials.form')
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