@extends('adminlte::page')

@section('title', 'Locações')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Locações
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Locações
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Erro ao realizar esta operação</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        
    <div class="container pt-5">   

        <form action="/locacoes.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">

        @if (isset($locacao))
            <form action="/locacoes.create/{{ $locacao->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/locacoes.create" method="POST" enctype="multipart/form-data">
        @endif

            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" class="form-control select_2" >
                    <option value=""></option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="codigo_locacao">Código Locação</label>
                <input type="text" name="codigo_locacao" placeholder="Digite o código da locação" class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" placeholder="Digite uma descrição" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="A">Ativo</option>
                    <option value="I">Inativo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/locacoes.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

