@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Clientes
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Clientes
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/clientes.create/" class="btn btn-primary mb-5">Novo Cliente</a>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Ações</th>
                    <th class="text-center">Nome Empresa</th>
                    <th class="text-center">CNPJ</th>
                    <th class="text-center">Telefone</th>
                    <th class="text-center">Bairo</th>
                    <th class="text-center">Endereço</th>
                    <th class="text-center">Cidade</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="text-center">
                            <a href="/clientes.edit/{{ $cliente->id }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td class="text-center">{{ $cliente->nome }}</td>
                        <td id="cnpj" class="text-center">{{ $cliente->cnpj }}</td>
                        <td id="phone_with_ddd" class="text-center">{{ $cliente->telefone }}</td>
                        <td class="text-center">{{ $cliente->bairro }}</td>
                        <td class="text-center">{{ $cliente->endereco }}</td>
                        <td class="text-center">{{ $cliente->cidade }}</td>
                        <td id="uf" class="text-center">{{ $cliente->uf }}</td>
                        <td class="text-center">{{ $cliente->status_formatado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $clientes->links() }}        

        
    </div>
</div>
@stop