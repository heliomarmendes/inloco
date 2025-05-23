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
                    <th>Pix</th>
                    <th>Centro de Custo</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr class="text-center">
                        <td>{{ $funcionario->nome }}</td>
                        <td>R$ R${{ $funcionario->getSalario(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->cargo->transporte 
                            - $funcionario->getTransporteAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->cargo->refeicao
                            - $funcionario->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->getInsalubridade(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->getHE50(\Request::get('data_inicio'), \Request::get('data_fim'))
                            - $funcionario->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim'))
                            - $funcionario->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim'))
                            - $funcionario->getInss(\Request::get('data_inicio'), \Request::get('data_fim')) }}
                        </td>
                        <td>{{ $funcionario->getPix(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
                        <td>{{ $funcionario->centrocusto->nome }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@stop
