@extends('adminlte::page')

@section('title', 'Funcionários')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Funcionários
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Funcionários
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

        <form action="/funcionarios.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">
        

        @if (isset($funcionario))
            <form action="/funcionarios.create/{{ $funcionario->id }}" method="POST" enctype="multipart/form-data">
            @method('POST')
        @else
            <form action="/funcionarios.create" method="POST" enctype="multipart/form-data">
        @endif
        
            @csrf

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Digite o nome" class="form-control" value="{{ isset($funcionario) ? $funcionario->nome : '' }}">
            </div>
            
            <div class="form-group">
                <label for="contrato">Contrato</label>
                <select name="contrato" class="form-control">
                    <option value="C">CLT</option>
                    <option value="A">Avulso</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input id="cpf" type="text" name="cpf" placeholder="Digite o CPF" class="form-control" value="{{ isset($funcionario) ? $funcionario->cpf : '' }}">
            </div>

            <div class="form-group">
                <label for="rg">RG</label>
                <input type="text" name="rg" placeholder="Digite o RG" class="form-control" value="{{ isset($funcionario) ? $funcionario->rg : '' }}">
            </div>

            <div class="form-group">
                <label for="pis">PIS</label>
                <input type="text" name="pis" placeholder="Digite o PIS" class="form-control" value="{{ isset($funcionario) ? $funcionario->pis : '' }}">
            </div>

            <div class="form-group">
                <label for="ctps">CTPS</label>
                <input type="text" name="ctps" placeholder="Digite o número da CTPS" class="form-control" value="{{ isset($funcionario) ? $funcionario->ctps : '' }}">
            </div>

            <div class="form-group">
                <label for="centrocusto_id">Centro de Custo</label>
                <select name="centrocusto_id" class="form-control select_2" value="{{ isset($funcionario) ? $funcionario->centrocusto_id : '' }}" >>
                    <option value="{{ isset($funcionario) ? $funcionario->centrocusto_id : '' }}"></option>
                    @foreach ($centrocustos as $centrocusto)
                        <option value="{{ $centrocusto->id }}">{{ $centrocusto->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="A">Ativo</option>
                    <option value="D">Desligado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_contratacao">Data da Contratação</label>
                <input type="date" name="data_contratacao" class="form-control" data-provide="datepicker" data-date-language="pt-BR" value="{{ isset($funcionario) ? $funcionario->data_contratacao : '' }}">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input id="phone_with_ddd" type="text" name="telefone"  placeholder="Digite o número de telefone" class="form-control" value="{{ isset($funcionario) ? $funcionario->telefone : '' }}">
            </div>

            <div class="form-group">
                <label for="cargo_id">Cargo</label>
                <select name="cargo_id" class="form-control select_2" value="{{ isset($funcionario) ? $funcionario->cargo_id : '' }}" >
                    <option value="{{ isset($funcionario) ? $funcionario->cargo_id : '' }}"></option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="locacao_id">Locação</label>
                <select name="locacao_id" class="form-control select_2" value="{{ isset($funcionario) ? $funcionario->locacao_id : '' }}" >>
                    <option value="{{ isset($funcionario) ? $funcionario->locacao_id : '' }}"></option>
                    @foreach ($locacoes as $locacao)
                        <option value="{{ $locacao->id }}">{{ $locacao->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/funcionarios.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

