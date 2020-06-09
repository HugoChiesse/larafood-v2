@extends('adminlte::page')

@section('title', "Detalhes da Mesa {$table->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}">Mesas</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('tables.show', $table->id) }}">Detalhes da Mesa</a></li>
</ol>
    <h1>Detalhes da Mesa <strong>{{ $table->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                
                <li><strong>Identificação: </strong> {{ $table->identify }}</li>
                <li><strong>Descrição: </strong> {{ $table->description }}</li>
                
            </ul>
            <hr>
            <form action="{{ route('tables.destroy', $table->id) }}" class="form" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar a Mesa: {{ $table->identify }}</button>
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