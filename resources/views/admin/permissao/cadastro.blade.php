@extends('adminlte::page')

@section('title', 'Cadastrar Grupo')

@section('content_header')
    <h1>Cadastrar Grupo</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('user.store')}}" method="post" class="form-horizontal">
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2">Nome Do Grupo</label>
                    <div class="col-sm-10">
                        <input name="nomo_do_grupo" 
                        class="form-control" value="{{old('nomo_do_grupo')}}"/>
                    </div>
                </div>
                @if ($errors->has('nomo_do_grupo'))
                    <div class="row">
                        <label class="col-sm-2"> </label>
                        <strong class="col-sm-10">{{ $errors->first('nomo_do_grupo') }}</strong>
                    </div>
                @endif
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