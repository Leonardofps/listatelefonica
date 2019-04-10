@extends('layouts.app')
@section('content')
<div class="container">
    <h1> Cadastro de Empresa</h1>

    @if(isset($empresa))
       <!-- <form class="form form-search form-ds" action="{{ route('empresa.store') }}" method="POST"> -->
        {!! Form::model($empresa, ['route' => ['empresa.update', $empresa->id], 'class'=>'form form-search form-ds', 'method'=>'PUT']) !!}
    @else
       <!-- <form class="form f orm-search form-ds" action="{{ route('empresa.store') }}" method="POST"> -->
        {!! Form::open(['route' => ['empresa.store'], 'class'=>'form f orm-search form-ds']) !!}
    @endif

        <div class="form-group">
        <label class="col-md-3 control-label" for="cnpj">CNPJ: </label>
            
        <!-- <input type="text" name="cnpj" placeholder="CNPJ:" class="form-control"> -->
        {!! Form::text('cnpj', null, ['oninput'=> 'mascaracnpj(this)','placeholder'=>'CNPJ:', 'class'=>'form-control', 'required'=> 'required']) !!}
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="razao_social">Razão Social: </label>

        <!-- <input type="text" name="razao_social" placeholder="Razão Social:" class="form-control"> -->
        {!! Form::text('razao_social', null, ['placeholder'=>'Razão Social:', 'class'=>'form-control', 'required'=> 'required'])!!}
        </div> 

        <div class="form-group">
        <label class="col-md-3 control-label" for="telefone1">Telefone: </label>

        <!-- <input type="text" name="telefone1" placeholder="Telefone:" class="form-control"> -->
        {!! Form::text('telefone1', null, ['oninput'=> 'mascarafixo(this)','placeholder'=>'Telefone:', 'class'=>'form-control', 'required'=> 'required'])!!}

        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="celular">Celular: </label>
        <!-- <input type="text" name="celular" placeholder="Celular:" class="form-control"> -->
        {!! Form::text('celular', null, ['oninput'=> 'mascaracelular(this)','placeholder'=>'Celular:', 'class'=>'form-control', 'required'=> 'required'])!!}
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Cadastrar</button>
        </div>
        {!!form::close()!!}
</div>
<!--Content Dinâmico-->
@endsection
