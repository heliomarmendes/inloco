@extends('adminlte::page')

@section('title', 'Centro de Custo')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fa fa-sitemap"></i> Centro de Custo
    <small class="text-muted"></small>
</h1>

@stop

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Centro de Custo
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/custos.create/" class="btn btn-primary mb-5">Novo Centro de Custo</a>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Nome do centro de custo</th>
                    <th class="text-center">CNPJ</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($centrocustos as $centrocusto)
                    <tr>
                        <td class="text-center">{{ $centrocusto->nome }}</td>
                        <td id="cnpj" class="text-center">{{ $centrocusto->cnpj }}</td>
                @endforeach
            </tbody>
        </table>

        {{ $centrocustos->links() }}                
        
    </div>
</div>
@stop