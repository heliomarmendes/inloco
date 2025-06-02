@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Cargos
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Cargos
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

        <form action="/cargos.edit/{{ $cargos->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">
        

        @if (isset($cargos))
            <form action="/cargos.edit/{{ $cargos->id }}" method="POST" enctype="multipart/form-data">
            @method('POST')
                @else
                    <form action="/cargos.edit" method="POST" enctype="multipart/form-data">
        @endif

            <div class="form-group">
                <label for="nome">Nome do Cargo</label>
                <input type="text" name="nome" placeholder="Digite o nome do cargo" class="form-control" value="{{ isset($cargos) ? $cargos->nome : '' }}">
            </div>
            
            <div class="form-group">
                <label for="salario">Salário</label>
                <input id="money5" type="char" name="salario" placeholder="Digite o salário" class="form-control" value="{{ isset($cargos) ? $cargos->salario : '' }}">
            </div>

            <div class="form-group">
                <label for="insalubridade">Insalubridade</label>
                <input id="money2" type="char" name="insalubridade" placeholder="Digite o valor da insalubridade" class="form-control" value="{{ isset($cargos) ? $cargos->insalubridade : '' }}">
            </div>

            <div class="form-group">
                <label for="refeicao">Refeição</label>
                <input id="money3" type="char" name="refeicao" placeholder="Digite o valor da refeição" class="form-control" value="{{ isset($cargos) ? $cargos->refeicao : '' }}">
            </div>

            <div class="form-group">
                <label for="transporte">Transporte</label>
                <input id="money4" type="char" name="transporte" placeholder="Digite o valor do transporte" class="form-control" value="{{ isset($cargos) ? $cargos->transporte : '' }}">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/cargos.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

