@extends('adminlte::page')

@section('title', 'INSS')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> INSS
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de INSS
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/inss.create/" class="btn btn-primary mb-5">Novo Lançamento</a>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Ações</th>
                    <th class="text-center">Funcionário</th>
                    <th class="text-center">Porcentagem</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Data Competência</th>
                    <th class="text-center">Observação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($inss as $inss)
                    <tr class="text-center">
                        <td>
                            <form action="/inss/{{ $inss->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $inss->funcionario->nome }}</td>
                        <td>{{ $inss->porcentagem }} %</td>
                        <td>R${{ $inss->valor_inss }}</td>
                        <td>{{ optional($inss->data_competencia)->format("d/m/Y") }}</td>
                        <td>{{ $inss->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirmarExclusao(event) {
        event.preventDefault();
        swal({
            title: "Você tem certeza que deseja excluir o registro?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancelar",
                catch: {
                    text: "Excluir",
                    value: true,
                },
            }
        })
        .then((willDelete) => {
            if (willDelete) {
                event.target.submit();
            } else {
                return false;
            }
        });
    }
</script>
</div>
@stop