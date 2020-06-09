@extends('adminlte::page')

@section('title', "Permissões Disponíveis ao Perfil {$profile->name}")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
</ol>

<h1>Permissões Disponíveis ao Perfil <strong>{{ $profile->name }} </strong></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('profiles.permissions.create', $profile->id) }}" method="post" class="form form-inline">
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
                    <th width="50px">#</th>
                    <th>Nome</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('profiles.permissions.store', $profile->id) }}" method="post">
                    @csrf
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            </td>
                            <td>{{ $permission->name }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $permissions->appends($filters)->links() !!}
        @else
        {!! $permissions->links() !!}
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