@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários Painel Administrativo
    <a href="{{route('user.create')}}"
        class="btn btn-sm btn-success">{{ __('adminlte::menu.user_create') }}</a>
    </h1>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Username</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->primeiro_nome . " " . $user->segundo_nome}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->usuario}}</td>
                        <td>
                            <a href="{{route('user.edit', ['user' => $user->id])}}" 
                                class="btn btn-sm btn-info">Editar</a>
                            <a href="{{route('user.destroy', ['user' => $user->id])}}"
                                class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
            {{$users->links()}}
        
    </div>
</div>

@endsection