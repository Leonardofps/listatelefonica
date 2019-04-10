@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Contatos <i class="fa fa-address-book-o" aria-hidden="true"></i></h1>
    
    <div class="content-din bg-white">

        <div class="form-search">

            {!! Form::open(['route' => 'pessoa.search', 'class' => 'form form-inline'])!!}

            {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder'=>'Pesquise um nome'])!!}
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

            <a href="{{route('pessoa.create')}}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Novo contato
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Nome da Secretária</th>
                <th>Categoria</th>
                <th width="150">Ações</th>

            </tr>
                @forelse($pessoas as $pessoa)
            <tr>
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->cargo}}</td>
                <td>{{$pessoa->emails}}</td>
                <td>{{$pessoa->telefone}}</td>
                <td>{{$pessoa->celular}}</td>
                <td>{{$pessoa->nome_secretaria}}</td>
                
                <td>
                @foreach($pessoa->categorias as $categoria)
                {{$categoria->nome}}, 
                @endforeach
                </td>
                
                <td>
                <a href="{{route('pessoa.edit', $pessoa->id)}}" class= "edit"> <i class="fa fa-edit fa-lg" title="Editar contato"></i> </a>
                <a href="{{route('pessoa.show', $pessoa->id)}}" class= "show"> <i class="fa fa-eye fa-lg" title="Visualizar contato"></i> </a>
                </td>
            </tr>
            @empty
            <tr>
                <td cosplan="200">Nenhum contato cadastrado</td>
            </tr>
            @endforelse

        </table>
 
    </div>
    <!--Content Dinâmico-->
</div>
@endsection
