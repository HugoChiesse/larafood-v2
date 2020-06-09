@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.show', $plan->url) }}">Detalhes do Plano</a></li>
</ol>
    <h1>Detalhes do Plano <strong>{{ $plan->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                
                <li><strong>Nome: </strong> {{ $plan->name }}</li>
                <li><strong>Preço: </strong>R$ {{ number_format($plan->price, 2, ',', '.') }}</li>
                <li><strong>Descrição: </strong> {{ $plan->description }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('plans.destroy', $plan->url) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar o Plano: {{ $plan->name }}</button>
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