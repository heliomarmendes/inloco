@extends('adminlte::page')

@section('title', 'Locações')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Locações
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Locações
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/locacoes.create/" class="btn btn-primary mb-5">Novo Lançamento</a>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Ações</th>
                    <th class="text-center">Código da Locação</th>
                    <th class="text-center">Nome Empresa</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Data do Cadastro</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($locacoes as $locacao)
                    <tr>
                        <td class="text-center">
                            <a href="/locacoes.edit/{{ $locacao->id }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td class="text-center">{{ $locacao->codigo_locacao }}</td>
                        <td class="text-center">{{ $locacao->cliente->nome }}</td>
                        <td class="text-center">{{ $locacao->descricao }}</td>
                        <td class="text-center">{{ $locacao->status_formatado }}</td>
                        <td class="text-center">{{ $locacao->created_at->format("d/m/Y") }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $locacoes->links() }}        
        
    </div>
</div>
@stop