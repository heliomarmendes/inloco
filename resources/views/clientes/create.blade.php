@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Clientes
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Clientes
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

        <form action="/clientes.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">
        

        @if (isset($cliente))
            <form action="/clientes.create/{{ $cliente->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/clientes.create" method="POST" enctype="multipart/form-data">
        @endif

            <div class="form-group">
                <label for="nome">Nome Cliente</label>
                <input type="text" name="nome" placeholder="Digite o nome do cliente" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input id="cnpj" type="char" name="cnpj" placeholder="Digite o CNPJ do cliente" class="form-control">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input id="phone_with_ddd" type="char" name="telefone" placeholder="Digite o telefone do cliente" class="form-control">
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" placeholder="Inserir o bairro" class="form-control">
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" placeholder="Inserir o endereço" class="form-control">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" placeholder="Insira a cidade" class="form-control">
            </div>

            <div class="form-group">
                <label for="uf">Estado</label>
                <input id="uf" type="text" name="uf" placeholder="Insira o estado - UF" class="form-control">
            </div>

            <div class="form-group">
                <label for="cep">CEP</label>
                <input id="cep" type="char" name="cep" placeholder="Insira o CEP" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="A">Ativo</option>
                    <option value="I">Inativo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_contrato">Data do Contrato</label>
                <input type="date" name="data_contrato" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
            </div>

            <div class="form-group">
                <label for="data_rescisao">Data da Rescisão</label>
                <input type="date" name="data_rescisao" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/clientes.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

