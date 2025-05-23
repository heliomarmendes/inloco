@extends('adminlte::page')

@section('title', 'Folha de Pagamento')

@section('content_header')

<h1 class="m-0 text-dark"><i class="fa fa-fw fa-file"></i> Folha de Pagamento
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Holerites
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <form action="" method="GET">
            <div class="row">
                <div class="form-group">
                    <div id="container" class="col-md-2">
                        <label id="data_inicio">Data Inicio</label>
                        <input type="date" name="data_inicio" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
                    </div>
                </div>

                <div class="form-group">
                    <div id="container" class="col-md-2">
                        <label id="data_fim">Data Fim</label>
                        <input type="date" name="data_fim" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div id="container" class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Pesquisar</button>                    
                    </div>
                </div>

            <div class="form-group">
                <div id="container" class="col-md-2">
                    <button id="btnlistanormal" class="btn btn-default btn-sm">Lista Completa</button>                    
                </div>
            </div>

                <!--<div class="form-group">
                    <div id="container" class="col-md-12">
                        <button id='btnlista' class="btn btn-default btn-sm">Lista Completa PDF</button>                    
                    </div>
                </div>-->
            </div>

        </form>
        
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Ações</th>
                    <th>Nome</th>
                    <th>Locação</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Transporte</th>
                    <th>Refeição</th>
                    <th>Insalubridade</th>
                    <th>H.E 50%</th>
                    <th>Adiantamentos</th>
                    <th>Faltas</th>
                    <th>INSS</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr class="text-center">
                        <td>
                            <button onclick="gerarFolha({{ $funcionario->id }})" class="btn btn-primary btn-sm">Gerar Folha</button>
                        </td>
                        
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->locacao->codigo_locacao  }}</td>
                        <td>{{ $funcionario->cargo->nome }}</td>
                        <td>R${{ $funcionario->getSalario(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
                        <td>R${{ $funcionario->cargo->transporte 
                            - $funcionario->getTransporteAtestado(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
                        <td>R${{ $funcionario->cargo->refeicao
                            - $funcionario->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>   
                        <td>R${{ $funcionario->getInsalubridade(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>    
                        <td>R${{ $funcionario->getHE50(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
                        <td>R${{ $funcionario->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
                        <td>R${{ $funcionario->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td> 
                        <td>R${{ $funcionario->getInss(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
                        <td>R${{ $funcionario->getSalario(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->cargo->transporte 
                            - $funcionario->getTransporteAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->cargo->refeicao
                            - $funcionario->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->getInsalubridade(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionario->getHE50(\Request::get('data_inicio'), \Request::get('data_fim'))
                            - $funcionario->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim'))
                            - $funcionario->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim'))
                            - $funcionario->getInss(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
    const urlParams = new URLSearchParams(window.location.search)
    const data_inicioParam = urlParams.get("data_inicio")
    const data_fimParam = urlParams.get("data_fim")

    function gerarFolha(id) {
        const url = '/holerites.individual/' + id
        
        window.open(url + '?' + 'data_fim=' + data_fimParam + '&' + 'data_inicio=' + data_inicioParam)
    }

    //document.querySelector("#btnlista").addEventListener('click', () => {
    //    window.open('/holerites.lista?data_fim=' + data_fimParam + '&' + 'data_inicio=' + data_inicioParam)
    //})

    document.querySelector("#btnlistanormal").addEventListener('click', () => {
        window.open('/holerites.listanormal?data_fim=' + data_fimParam + '&' + 'data_inicio=' + data_inicioParam)
    })

</script>

@stop
