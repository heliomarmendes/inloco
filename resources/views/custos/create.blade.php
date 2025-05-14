@extends('adminlte::page')

@section('title', 'Centro de Custo')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fa fa-sitemap"></i> Centro de Custo
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Centro de Custo
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

        <form action="/custos.create" method="POST" enctype="multipart/form-data">
            @csrf
            
    </div>
    
    <div class="card-body">

        @if (isset($custo))
            <form action="/custos.create/{{ $custo->id }}" method="POST" enctype="multipart/form-data">
            @method('GET')
                @else
                    <form action="/custos.create" method="POST" enctype="multipart/form-data">
        @endif

            <div class="form-group">
                <label for="nome">Nome do Centro de Custo</label>
                <input type="text" name="nome" placeholder="Digite o nome do centro de custo" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="numbers" name="cnpj" placeholder="Digite o cnpj" class="form-control" id="cnpj">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/custos.index" class="btn btn-light">Voltar</a></button>
            
        </form>
    </div>
</div>
@stop

