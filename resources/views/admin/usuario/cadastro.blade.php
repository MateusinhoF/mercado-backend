@extends('adminlte::page')

@section('title', 'Cadastrar Usuário')

@section('content_header')
    <h1>Cadastrar Usuário</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('user.store')}}" method="post" class="form-horizontal">
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">Primeiro Nome</label>
                    <div class="col-sm-10">
                        <input name="first_name" 
                        class="form-control" value="{{old('first_name')}}"/>
                    </div>
                </div>
                @if ($errors->has('first_name'))
                <div class="row">
                    <label class="col-sm-2"> </label>
                    <strong class="col-sm-10">{{ $errors->first('first_name') }}</strong>
                </div>
            @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">Segundo Nome</label>
                    <div class="col-sm-10">
                        <input name="second_name" 
                        class="form-control" value="{{old('second_name')}}"/>
                    </div>
                </div>
                @if ($errors->has('second_name'))
                    <div class="row">
                        <label class="col-sm-2"> </label>
                        <strong class="col-sm-10">{{ $errors->first('second_name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email"
                        class="form-control" value="{{old('email')}}"/>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <div class="row">
                        <label class="col-sm-2"> </label>
                        <strong class="col-sm-10">{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">Usuário</label>
                    <div class="col-sm-10">
                        <input name="usuario" class="form-control"/>
                    </div>
                </div>
                @if ($errors->has('usuario'))
                    <div class="row">
                        <label class="col-sm-2"> </label>
                        <strong class="col-sm-10">{{ $errors->first('usuario') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control"/>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <div class="row">
                        <label class="col-sm-2"> </label>
                        <strong class="col-sm-10">{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">Confirmar Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control"/>
                    </div>
                </div>
                @if ($errors->has('password_confirmation'))
                    <div class="row">
                        <label class="col-sm-2"> </label>
                        <strong class="col-sm-10">{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">Grupo de usuário</label>
                    <div class="col-sm-10">
                        <select name="permissao" class="form-control">
                            @foreach($grupos as $grupo)
                                <option value="{{$grupo->id}}">
                                    {{$grupo->nomo_do_grupo}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" value="Cadastrar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection