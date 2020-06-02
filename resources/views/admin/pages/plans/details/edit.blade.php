@extends('adminlte::page')

@section('title', "Editar o Detalhe do Plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Plano</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('details_plan.index', $plan->url) }}">Detalhes do Plano</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details_plan.create', $plan->url) }}">Editar</a></li>
</ol>
<h1>Editar o Detalhe do Plano {{ $plan->name }}>ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('details_plan.update', [$plan->url, $detail->id]) }}" class="form" method="POST">
                @method('put')
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