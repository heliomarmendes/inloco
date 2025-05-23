<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>

        <table class="table table-striped">

    
    <thead>    
            
    <div class="row">
        <div id="container" class="col-md-12">
            <img src="./imagem/innovativelog.png" alt="" height="100" width="140">
        </div>
    </div>


    <div class="row">
        <div id="container" class="cl-md-12">
    
        <style>
            table, th,td  {
                border: 1px solid black;
            }
        </style>

        <table>

          <tr>  
            <br>
            <th>MAPA DE FATURAMENTO</th>
          </tr>
    
          <tr>
            <th>Nome:</th> 
            <td>{{ $funcionarios->nome }}</td>
          </tr>

          <tr>
            <th>Endereço:</th>
            <th></th>
            <th>TEL:</th>
            <td>{{ ($funcionarios->telefone) }}</td>
          </tr>

          <tr>
            <th>RG:</th>
            <td>{{ $funcionarios->rg }}</td>
            <th>CPF:</th>
            <td>{{ $funcionarios->cpf }}</td>
          </tr>

          <tr>
            <th>Data Admissão:</th>
            <td>{{ optional($funcionarios->data_contratacao)->format("d/m/Y") }}</td>
            <th>Locação:</th>
            <td>{{ $funcionarios->locacao->codigo_locacao  }}</td>
          </tr>

          <tr>
            <th>Ref ao Mês:</th>
            <td>{{ $funcionarios->getReferencia(\Request::get('data_inicio'), \Request::get('data_fim')) }}</td>
            <th>Cargo:</th>
            <td>{{ $funcionarios->cargo->nome }}</td>
          </tr>

          <br>

          <th>Demonstrativo de Pagamento</th>

          <tr>
            <th>Descrição</th>
            <th>Ref</th>
            <th>*****</th>
            <th>Valores</th>
          </tr>

          <tr>
            <th>Salário</th>
            <th></th>
            <th>=</th>
            <td>R$ {{ number_format($funcionarios->getSalario(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
          </tr>

          <tr>
            <th>Vale Transporte</th>
            <th></th>
            <th>=</th>
            <td>R$ {{ number_format($funcionarios->cargo->transporte 
              - $funcionarios->getTransporteAtestado(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
          </tr>

          <tr>
            <th>Alimentação</th>
            <th></th>
            <th>=</th>
            <td>R$ {{ number_format($funcionarios->cargo->refeicao
              - $funcionarios->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
          </tr>

          <tr>
            <th>Insalubridade</th>
            <th></th>
            <th>=</th>
            <td>R$ {{ number_format($funcionarios->getInsalubridade(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
          </tr>

          <tr>
            <th>H.E 50%</th>
            <th>{{ number_format($funcionarios->getHorasHE50(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ":", ":") }}h</th>
            <th>=</th>
            <td>R$ {{ number_format($funcionarios->getHE50(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
          </tr>

          <tr>
            <th>Total Bruto</th>
            <th>***********</th>
            <th>=</th>
            <th>R$ {{ number_format($funcionarios->getSalario(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionarios->cargo->transporte 
                            - $funcionarios->getTransporteAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionarios->cargo->refeicao
                            - $funcionarios->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionarios->getInsalubridade(\Request::get('data_inicio'), \Request::get('data_fim'))
                            + $funcionarios->getHE50(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</th>
          </tr>

          <br>

          <tr>
            <th>Adiantamentos</th>
            <th>-</th>
            <th>=</th>
            <td>R$  {{ number_format($funcionarios->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
          </tr>

          <tr>
            <th>INSS</th>
            <th>{{ $funcionarios->getPorcentagemInss(\Request::get('data_inicio'), \Request::get('data_fim')) }}%</th>
            <th>=</th>
            <td>R$ {{ number_format($funcionarios->getInss(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", "." ) }}</td>
          </tr>

          <tr>
            <th>Faltas/DSR</th>
            <th></th>
            <th>=</th>
            <td>R$ {{ number_format($funcionarios->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</td>
          </tr>

          <tr>
            <th>Total Desconto</th>
            <th>***********</th>
            <th>=</th>
            <th>R$  {{ number_format($funcionarios->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim')) 
                + $funcionarios->getInss(\Request::get('data_inicio'), \Request::get('data_fim')) 
                + $funcionarios->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</th>
          </tr>

          <tr>
              <br>
          <tr>
            <th>Total Líquido</th>
            <th>***********</th>
            <th>=</th>
            <th>R${{ number_format($funcionarios->getSalario(\Request::get('data_inicio'), \Request::get('data_fim'))
                     + $funcionarios->cargo->transporte 
                     - $funcionarios->getTransporteAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                     + $funcionarios->cargo->refeicao
                     - $funcionarios->getAlimentacaoAtestado(\Request::get('data_inicio'), \Request::get('data_fim'))
                     + $funcionarios->getInsalubridade(\Request::get('data_inicio'), \Request::get('data_fim'))
                     + $funcionarios->getHE50(\Request::get('data_inicio'), \Request::get('data_fim'))
                     - $funcionarios->getAdiantamentos(\Request::get('data_inicio'), \Request::get('data_fim'))
                     - $funcionarios->getFaltas(\Request::get('data_inicio'), \Request::get('data_fim'))
                     - $funcionarios->getInss(\Request::get('data_inicio'), \Request::get('data_fim')), 2, ",", ".") }}</th>
          </tr>
        </table>

        </div>
    </div>
    
            <h5>Autorizo os descontos descriminados neste mapa</h5>
            <h5>Data _____________________</h5>
            <br>
            <h5>______________________________</h5>
            <h5>{{ $funcionarios->nome }}</h5>
    
    </table>

    <script>

      const urlParams = new URLSearchParams(window.location.search)

      console.log(window.location.search)

      const data_inicioParam = urlParams.get("data_inicio")

      console.log(data_inicioParam)
            
      const data_fimParam = urlParams.get("data_fim")

      console.log(data_fimParam)

    </script>
</thead>
    


