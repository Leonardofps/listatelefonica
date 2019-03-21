@extends('layouts.app')
@section('content')

<div class="container">
    <h1> Cadastro de contatos</h1>

    <!--<form class="form form-search form-ds" action="{{route('pessoa.store')}}" method="POST">-->
    <div class="form-group">
        <label class="col-md-2 control-label" for="cnpj">CNPJ: </label>

        <!-- <input type="text" name="nome" placeholder="Nome:" class="form-control">-->
       <strong><li>{{$empresa->cnpj}}</li></strong>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="razao_social">Razão Social: </label>

        <!--<input type="text" name="cargo" placeholder="Cargo:" class="form-control">-->
        <strong><li>{{$empresa->razao_social}}</li></strong>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="telefone1">Telefone: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        <strong><li>{{$empresa->telefone1}}</li></strong>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="celular">Celular: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        <strong><li>{{$empresa->celular}}</li></strong>
    </div>

    {!! Form::open(['route' => ['empresa.destroy', $empresa->id], 'class'=> 'form form-search form-ds', 'method'=> 'DELETE']) !!}
    <div class="form-group">
        <button class="btn btn-danger">Deletar empresa</button>
    </div>
    {!! Form::close() !!}
</div>
@endsection
