@extends('adminlte::page')

@section('title', "Detalhes do Produto {$product->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.show', $product->id) }}">Detalhes do Produto</a></li>
</ol>
    <h1>Detalhes do Produto <strong>{{ $product->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                
                <li>
                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;">
                </li>
                <li><strong>Nome: </strong> {{ $product->title }}</li>
                <li><strong>Preço: </strong> R$ {{ number_format($product->price, 2, ',', '.') }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('products.destroy', $product->id) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar o Produto: {{ $product->title }}</button>
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