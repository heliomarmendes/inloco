@extends('adminlte::page')

@section('title', 'Atestados')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Atestados
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Atestados
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

        <form action="/atestados.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">

        @if (isset($funcionario))
            <form action="/atestados.create/{{ $funcionario->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/atestados.create" method="POST" enctype="multipart/form-data">
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
                <label for="data_atestado">Data do Atestado</label>
                <input type="date" name="data_atestado" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
            </div>
            
            <div class="form-group">
                <label for="dias">Dias</label>
                <input type="float" name="dias" placeholder="Digite o valor" class="form-control">
            </div>

            <div class="form-group">
                <label for="valor_transporte">Valor Transporte</label>
                <input id="money2" type="float" name="valor_transporte" placeholder="Digite o valor do desconto do vale transporte" class="form-control">
            </div>

            <div class="form-group">
                <label for="valor_alimentacao">Valor Alimentação</label>
                <input id="money3" type="float" name="valor_alimentacao" placeholder="Digite o valor do desconto da alimentação" class="form-control">
            </div>

            <div class="form-group">
                <label for="observacao">Observação</label>
                <input type="text" name="observacao" placeholder="Digite alguma observação" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/atestados.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

