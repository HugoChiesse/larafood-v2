@extends('adminlte::page')

@section('title', "Adicionar Novo Detalhe ao Plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Plano</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('details_plan.index', $plan->url) }}">Detalhes do Plano</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details_plan.create', $plan->url) }}">Cadastar</a></li>
</ol>
<h1>Adicionar Novo Detalhe ao Plano {{ $plan->name }}>ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('details_plan.store', $plan->url) }}" class="form" method="POST">
                @include('admin.pages.plans.details._partials.form')
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