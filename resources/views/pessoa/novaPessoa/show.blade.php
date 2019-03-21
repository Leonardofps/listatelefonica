@extends('layouts.app')
@section('content')

<div class="container">
    <h1> Cadastro de contatos</h1>

    <!--<form class="form form-search form-ds" action="{{route('pessoa.store')}}" method="POST">-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="name">Nome: </label>

        <!-- <input type="text" name="nome" placeholder="Nome:" class="form-control">-->
       <strong><li>{{$pessoa->nome}}</li></strong>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="cargo">Cargo: </label>

        <!--<input type="text" name="cargo" placeholder="Cargo:" class="form-control">-->
        <strong><li>{{$pessoa->cargo}}</li></strong>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="email">E-mail: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        <strong><li>{{$pessoa->emails}}</li></strong>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="telefone">Telefone: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        <strong><li>{{$pessoa->telefone}}</li></strong>    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="celular">Celular: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        <strong><li>{{$pessoa->celular}}</li></strong>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="nome_secretaria">Nome da Secretária: </label>

        <!-- <input type="text" name="nome_secretaria" placeholder="Secretária:" class="form-control">-->
        <strong><li>{{$pessoa->nome_secretaria}}</li></strong>    
    </div>
    {!! Form::open(['route' => ['pessoa.destroy', $pessoa->id], 'class'=> 'form form-search form-ds', 'method'=> 'DELETE']) !!}
    <div class="form-group">
        <button class="btn btn-danger">Deletar contato</button>
    </div>
    {!! Form::close() !!}
</div>
@endsection
