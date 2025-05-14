@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fa fa-sitemap"></i> Cargos
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Cargos
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/cargos.create/" class="btn btn-primary mb-5">Novo Cargo</a>
    
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Ações</th>
                <th>Nome do cargo</th>
                <th>Salário</th>
                <th>Insalubridade</th>
                <th>Refeição</th>
                <th>Transporte</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($cargos as $cargo)
                <tr class="text-center">
                    <td>
                        <a href="/cargos.edit/{{ $cargo->id }}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                    <td>{{$cargo->nome}}</td>
                    <td>{{$cargo->salario}}</td>
                    <td>{{$cargo->insalubridade}}</td>
                    <td>{{$cargo->refeicao}}</td>
                    <td>{{$cargo->transporte}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

        {{ $cargos->links() }}                
        
    </div>
</div>
@stop