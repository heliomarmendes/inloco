@extends('adminlte::page')

@section('title', 'Adiantamentos')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Adiantamentos
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Adiantamentos
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

        <form action="/adiantamentos.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">

        @if (isset($funcionario))
            <form action="/adiantamentos.create/{{ $adiantamento->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/adiantamentos.create" method="POST" enctype="multipart/form-data">
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
                <label for="valor">Valor</label>
                <input id="money2" type="text" name="valor" placeholder="Digite o valor" class="form-control">
            </div>

            <div class="form-group">
                <label for="observacao">Observação</label>
                <input type="text" name="observacao" placeholder="Digite alguma observação" class="form-control">
            </div>

            <div class="form-group">
                <label for="data_adiantamento">Data do Vale</label>
                <input type="date" name="data_adiantamento" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/adiantamentos.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

