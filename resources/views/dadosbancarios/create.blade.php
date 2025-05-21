@extends('adminlte::page')

@section('title', 'Dados Bancários')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Dados Bancários
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Dados Bancários
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

        <form action="/dadosbancarios.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">

        @if (isset($funcionario))
            <form action="/dadosbancarios.create/{{ $funcionario->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/dadosbancarios.create" method="POST" enctype="multipart/form-data">
        @endif

            <div class="form-group">
                <label for="funcionario_id">Funcionario</label>
                <select name="funcionario_id" class="form-control select_2" >
                    <option value=""></option>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="banco">Banco</label>
                <input type="text" name="banco" placeholder="Digite o banco" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="agencia">Agência</label>
                <input type="text" name="agencia" placeholder="Digite a agência" class="form-control">
            </div>

            <div class="form-group">
                <label for="conta">Conta</label>
                <input type="text" name="conta" placeholder="Digite a conta" class="form-control">
            </div>

            <div class="form-group">
                <label for="pix">PIX</label>
                <input type="text" name="pix" placeholder="Digite o PIX" class="form-control">
            </div>

            <div class="form-group">
                <label for="favorecido">Favorecido</label>
                <input type="text" name="favorecido" placeholder="Digite o favorecido" class="form-control">
            </div>

            <div class="form-group">
                <label for="desconto">Desconto</label>
                <input id="money2" type="float" name="desconto" placeholder="Digite o desconto da transferência" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/dadosbancarios.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

