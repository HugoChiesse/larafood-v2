@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
</ol>

<h1>Produtos <a href="{{ route('products.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('products.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nome" value="{{ $filters['filter'] ?? '' }}"
                class="form-control">&nbsp;
            <button type="submit" class="btn btn-dark">Filtar</button>
        </form>
    </div>
    <div class="card-body">
        @include('admin.includes.alerts')
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Valor</th>
                    <th width="200px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;">
                    </td>
                    <td>{{ $product->title }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">Ver</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('products.categories', $product->id) }}" class="btn btn-secondary"><i class="fas fa-layer-group"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $products->appends($filters)->links() !!}
        @else
        {!! $products->links() !!}
        @endif
    </div>
</div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}