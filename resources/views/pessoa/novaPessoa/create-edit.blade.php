@extends('layouts.app')
@section('content')

<div class="container">
    <h1> Cadastro de contatos</h1>

    @if(isset($pessoa))
    <!--<form class="form form-search form-ds" action="{{ route('pessoa.update', $pessoa->id) }}" method="POST">-->
    {!! Form::model($pessoa, ['route' => ['pessoa.update', $pessoa->id],'class'=> 'form form-search form-ds', 'method'
    => 'PUT']) !!}
    @else
    <!--<form class="form form-search form-ds" action="{{route('pessoa.store')}}" method="POST">-->
    {!! Form::open(['route' => 'pessoa.store','class'=> 'form form-search form-ds']) !!}
    @endif
    <div class="form-group">
        <label class="col-md-3 control-label" for="name">Nome: </label>

        <!-- <input type="text" name="nome" placeholder="Nome:" class="form-control">-->
        {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome', 'required'=> 'required', ]) !!}
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="cargo">Cargo: </label>

        <!--<input type="text" name="cargo" placeholder="Cargo:" class="form-control">-->
        {!! Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Cargo', 'required'=> 'required']) !!}
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="email">E-mail: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        {!! Form::text('emails', null, ['class' => 'form-control', 'placeholder' => 'E-Mail', 'required'=> 'required']) !!}
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="telefone">Telefone: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        {!! Form::text('telefone', null, ['oninput'=> 'mascarafixo(this)', 'class' => 'form-control', 'placeholder' => 'Telefone', 'id' => 'telefone', 'required'=> 'required']) !!}
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="celular">Celular: </label>

        <!--<input type="text" name="emails" placeholder="E-mail:" class="form-control">-->
        {!! Form::text('celular', null, ['oninput' => 'mascaracelular(this)', 'id' => 'celular', 'class' => 'form-control', 'placeholder' => 'Celular']) !!}
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="nome_secretaria">Nome da Secretária: </label>
        <!-- <input type="text" name="nome_secretaria" placeholder="Secretária:" class="form-control">-->
        {!! Form::text('nome_secretaria', null, ['class' => 'form-control', 'placeholder' => 'Nome da Secretária']) !!}
    </div> 

    <div class="form-group">
        <label class="col-md-3 control-label" for="categoria">Escolha uma categoria: </label>
        @foreach ($categorias as $cat)
            {!! Form::checkbox('categorias[]',$cat->id) !!} {!! $cat->nome!!}  
        @endforeach
    </div>

    @if(!isset($pessoa))
    <div class="form-group">
        <button class="btn btn-primary">Cadastrar</button>
    </div>

    @else
    <div class="form-group">
        <button class="btn btn-primary">Atualizar</button>
    </div>
    @endif

    {!! Form::close() !!}
</div>
@endsection
