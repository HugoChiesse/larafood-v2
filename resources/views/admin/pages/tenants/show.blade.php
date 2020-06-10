@extends('adminlte::page')

@section('title', "Detalhes da Empresa {$tenant->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tenants.show', $tenant->id) }}">Detalhes da Empresa</a></li>
</ol>
<h1>Detalhes da Empresa <strong>{{ $tenant->name }}</strong></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
        @include('admin.includes.alerts')
        <ul>

            <li>
                <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width: 90px;">
            </li>
            <li>
                <strong>Plano: </strong> {{ $tenant->plan->name }}
            </li>
            <li>
                <strong>Nome: </strong> {{ $tenant->name }}
            </li>
            <li>
                <strong>URL: </strong> {{ $tenant->url }}
            </li>
            <li>
                <strong>E-mail: </strong> {{ $tenant->email }}
            </li>
            <li>
                <strong>CNPJ: </strong> {{ $tenant->cnpj }}
            </li>
            <li>
                <strong>Ativo: </strong> {{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}
            </li>

        </ul> 
        <hr>
            <h3>Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura: </strong> {{ $tenant->subscription }}
                </li>
                <li>
                    <strong>Data Expira: </strong> {{ $tenant->expires_at }}
                </li>
                <li>
                    <strong>Identificador: </strong> {{ $tenant->subscription_id }}
                </li>
                <li>
                    <strong>Ativo? </strong> {{ $tenant->subscription_active ? 'SIM' : 'NÃO' }}
                </li>
                <li>
                    <strong>Cancelou? </strong> {{ $tenant->subscription_suspended ? 'SIM' : 'NÃO' }}
                </li>
            </ul>

        <hr>
        <form action="{{ route('tenants.destroy', $tenant->id) }}" class="form" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Deletar a Empresa: {{ $tenant->name }}</button>
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