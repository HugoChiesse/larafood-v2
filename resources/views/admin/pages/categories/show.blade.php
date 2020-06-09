@extends('adminlte::page')

@section('title', "Detalhes da Categoria {$category->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categorias</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.show', $category->id) }}">Detalhes da Categoria</a></li>
</ol>
    <h1>Detalhes da Categoria <strong>{{ $category->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                
                <li><strong>Nome: </strong> {{ $category->name }}</li>
                <li><strong>Descrição: </strong> {{ $category->description }}</li>
                <li><strong>Empresa: </strong> {{ $category->tenant->name }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('categories.destroy', $category->id) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar a Categoria: {{ $category->name }}</button>
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