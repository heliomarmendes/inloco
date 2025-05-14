@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fa fa-sitemap"></i> Cargos
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

        <form action="/cargos.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">

        @if (isset($cargo))
            <form action="/cargos.create/{{ $cargo->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/cargos.create" method="POST" enctype="multipart/form-data">
        @endif

            <div class="form-group">
                <label for="nome">Nome do Cargo</label>
                <input type="text" name="nome" placeholder="Digite o cargo" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="salario">Salário</label>
                <input id="money2" type="char" name="salario" placeholder="Digite o salário" class="form-control">
            </div>

            <div class="form-group">
                <label for="insalubridade">Insalubridade</label>
                <input id="money3" type="char" name="insalubridade" placeholder="Digite o valor da insalubridade" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="refeicao">Alimentação</label> 
                <input id="money4" type="char" name="refeicao" placeholder="Digite a alimentação" class="form-control">
            </div>


            <div class="form-group">
                <label for="transporte">Vale Transporte</label>
                <input id="money5" type="char" name="transporte" placeholder="Digite o valor do transporte " class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/cargos.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

