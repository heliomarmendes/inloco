@extends('adminlte::page')

@section('title', 'HE50')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> HE50
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            HE50
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

        <form action="/he50.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">

        @if (isset($funcionario))
            <form action="/he50.create/{{ $funcionario->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/he50.create" method="POST" enctype="multipart/form-data">
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
                <label for="data_he50">Data da H.E 50%</label>
                <input type="date" name="data_he50" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
            </div>

            <div class="form-group">
                <label for="horas">Quantidade de Horas 50%</label>
                <input type="float" name="horas" placeholder="Digite o valor" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="valor">Valor</label>
                <input id="money2" type="float" name="valor" placeholder="Digite o valor" class="form-control">
            </div>

            <div class="form-group">
                <label for="observacao">Observação</label>
                <input type="text" name="observacao" placeholder="Digite alguma observação" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/he50.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

