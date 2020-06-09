@extends('adminlte::page')

@section('title', "Detalhes do Detalhe {$detail->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Plano</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('details_plan.index', $plan->url) }}">Detalhes do Plano</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details_plan.show', [$plan->url, $detail->id]) }}">Detalhe</a></li>
</ol>
    <h1>Detalhes do Detalhe <strong>{{ $detail->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <ul>
                
                <li><strong>Nome: </strong> {{ $detail->name }}</li>
                <li><strong>Descrição: </strong> {{ $detail->description }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('details_plan.destroy', [$plan->url, $detail->id]) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar o Detalhe do Plano: {{ $detail->name }}</button>
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