@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Empresas</h1>

    <div class="content-din bg-white">

        <div class="form-search">
            
            {!! Form::open(['route' => 'empresa.search', 'class' => 'form form-inline'])!!}

            {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder'=>'Digite o nome da empresa'])!!}
            <button class="btn btn-search">Pesquisar</button>
            {!! Form::close() !!}
        </div>

        <div class="messages">
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
            @endif
        </div>

        <div class="class-btn-insert">
            <a href="{{route('empresa.create')}}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Nova Empresa
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>CNPJ</th>
                <th>Razão Social</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th width="150">Ações</th>
            </tr>

            @forelse($empresas as $empresa)
                <tr>
                    <td>{{$empresa->cnpj}}</td>
                    <td>{{$empresa->razao_social}}</td>
                    <td>{{$empresa->telefone1}}</td>
                    <td>{{$empresa->celular}}</td>
                 <td>
                 <a href="{{route('empresa.edit', $empresa->id)}}" class="edit"> <i class="fa fa-edit fa-lg" title="Editar empresa"></i> </a>
                 <a href="{{route('empresa.show', $empresa->id)}}" class="show"> <i class="fa fa-eye fa-lg" title="Visualizar empresa"></i> </a>
                 </td>
                </tr>
            @empty
                <tr>
                    <td cosplan="200">Nenhum contato cadastrado</td>
                </tr>
            @endforelse
        </table>

       {!! $empresas->links() !!}

    </div>
    <!--Content Dinâmico-->

</div>
@endsection
