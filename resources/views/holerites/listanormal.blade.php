@extends('adminlte::page')

@section('title', 'Lista de Pagamento')

@section('content_header')

<h1 class="m-0 text-dark"><i class="fa fa-fw fa-file"></i> Lista de Pagamento
    <small class="text-muted"></small>
</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
        Lista de Pagamento
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>C Desconto</th>
                    <th>Agência</th>
                    <th>Conta</th>
                    <th>Pix</th>
                    <th>Banco</th>
                    <th>Centro de Custo</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr class="text-center">
                        <td>{{ $funcionario->nome }}</td>
                        <td>R$ {{ number_format($funcionario->getSalario(\Request::get('data_inicio'), \Request::get('data_fim')) 
                                + $funcionario->getAjudaCusto(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getAluguelCusto(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getAlimentacao(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->cargo->aux_de_dados
                                + $funcionario->getPericulosidade(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getBoletas(\Request::get('data_inicio'), \Request::get('data_fim')) 
                                + $funcionario->getGratificacoes(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getTransportes(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getHE50(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getHE100(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getGasolina(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getInss(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getPecas(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAjudaAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAluguelAtestado(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}
                        </td>      
                        <td>R$ {{ number_format($funcionario->getSalario(\Request::get('data_inicio'), \Request::get('data_fim')) 
                                + $funcionario->getAjudaCusto(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getAlimentacao(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->cargo->aux_de_dados
                                + $funcionario->getPericulosidade(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getBoletas(\Request::get('data_inicio'), \Request::get('data_fim')) 
                                + $funcionario->getGratificacoes(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getTransportes(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getHE50(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getHE100(\Request::get('data_inicio'), \Request::get('data_fim'))
                                + $funcionario->getAluguelCusto(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getGasolina(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getInss(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getPecas(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getDesconto(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAjudaAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                                - $funcionario->getAluguelAtestado(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", "." ) }}</td>
                        <td>{{ $funcionario->dadosbancarios->agencia }}</td>     
                        <td>{{ $funcionario->dadosbancarios->conta }}</td>
                        <td>{{ $funcionario->dadosbancarios->pix }}</td>
                        <td>{{ $funcionario->dadosbancarios->banco }}</td>
                        <td>{{ $funcionario->centrocusto->nome }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@stop
