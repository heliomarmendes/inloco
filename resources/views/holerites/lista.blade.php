<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>

        <table class="table table-striped">


        <style>
            table, th,td  {
                border: 1px solid black;
            }

        </style>

        <table> 
        
            <thead>
                    <tr class="text-center">
                        <th>Nome</th>
                        <th>Locação</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Despesas/moto</th>
                        <th>Vale Trans</th>
                        <th>Refeição</th>
                        <th>Adic. Per.</th>
                        <th>Gasolina</th>
                        <th>Adiant</th>
                        <th>Faltas</th>
                        <th>Boletas</th>
                        <th>INSS</th>
                        <th>Peças</th>
                        <th>Total</th>
                    </tr>
            </thead>

            <tbody>
                    @foreach ($funcionarios as $funcionario)
                        <tr class="text-center">                         
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->locacao->codigo_locacao  }}</td>
                            <td>{{ $funcionario->cargo->nome }}</td>
                            <td>R$ {{ number_format($funcionario->getSalario(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
                            <td>R$ {{ number_format($funcionario->getAjudaCusto(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", "." ) }}</td>
                            <td>R$ {{ number_format($funcionario->getTransportes(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", "." ) }}</td> <!--vale transporte virou aux de dados-->
                            <td>R$ {{ number_format($funcionario->getAlimentacao(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", "." ) }}</td>
                            <td>R$ {{ number_format($funcionario->getPericulosidade(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", "." ) }}</td>
                            <td>R$ {{ number_format($funcionario->getGasolina(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", "." ) }}</td>
                            <td>R$ {{ number_format($funcionario->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
                            <td>R$ {{ number_format($funcionario->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
                            <td>R$ {{ number_format($funcionario->getBoletas(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
                            <td>R$ {{ number_format($funcionario->getInss(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
                            <td>R$ {{ number_format($funcionario->getPecas(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
                            <td>R$ {{ number_format($funcionario->getSalario(\Request::get('data_inicio'), \Request::get('data_fim')) 
                                    + $funcionario->getAjudaCusto(\Request::get('data_inicio'), \Request::get('data_fim')) 
                                    + $funcionario->getAlimentacao(\Request::get('data_inicio'), \Request::get('data_fim'))
                                    + $funcionario->getPericulosidade(\Request::get('data_inicio'), \Request::get('data_fim'))
                                    + $funcionario->getTransportes(\Request::get('data_inicio'), \Request::get('data_fim'))
                                    + $funcionario->getBoletas(\Request::get('data_inicio'), \Request::get('data_fim')) 
                                    - $funcionario->getGasolina(\Request::get('data_inicio'), \Request::get('data_fim'))
                                    - $funcionario->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim'))
                                    - $funcionario->getPecas(\Request::get('data_inicio'), \Request::get('data_fim'))
                                    - $funcionario->getInss(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </head>
    




