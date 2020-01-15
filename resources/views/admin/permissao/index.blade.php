@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Usuários Painel Administrativo
    <a href="{{route('permission.create')}}"
        class="btn btn-sm btn-success">{{ __('adminlte::menu.permission_create') }}</a>
    </h1>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Do Grupo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                    <tr>
                        <td>{{$grupo->id}}</td>
                        <td>{{$grupo->nomo_do_grupo}}</td>
                        <td>
                            <a href="{{route('permission.edit', ['permission' => $grupo->id])}}" 
                                class="btn btn-sm btn-info">Editar</a>
                            <a href="{{route('permission.destroy', ['permission' => $grupo->id])}}"
                                class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
            {{$grupos->links()}}
        
    </div>
</div>

@endsection