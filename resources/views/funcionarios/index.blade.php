@extends('adminlte::page')

@section('title', 'Funcionários')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Funcionários
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Funcionários
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/funcionarios.create/" class="btn btn-primary mb-5">Novo Funcionário</a>
    
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Ações</th>
                    <th>Nome</th>
                    <th>Contrato</th>
                    <th>Status</th> 
                    <th>Centro de Custo</th> 
                    <th>Cargo</th>
                    <th>Locação</th>
                    <th>Telefone</th>
                    <th>Data Contratacao</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr class="text-center">
                        <td>
                            <a href="/funcionarios.edit/{{ $funcionario->id }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->tipocontrato }}</td>
                            <td>{{ $funcionario->status_formatado }}</td>
                            <td>{{ $funcionario->centrocusto->nome }}</td>
                            <td>{{ $funcionario->cargo->nome }}</td>
                            <td>{{ $funcionario->locacao->codigo_locacao }}</td>
                            <td id="phone_with_ddd">{{ $funcionario->telefone }}
                            <td>{{ optional($funcionario->data_contratacao)->format("d/m/Y") }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
</div>
@stop