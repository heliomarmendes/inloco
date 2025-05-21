@extends('adminlte::page')

@section('title', 'Alimentação')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Alimentação
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Alimentação
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/alimentacoes.create/" class="btn btn-primary mb-5">Novo Lançamento</a>
    
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Ações</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Mês Vale Alimentação</th>
                    <th>Observação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($alimentacoes as $alimentacao)
                    <tr class="text-center">
                        <td>
                            <form action="/alimentacoes/{{ $alimentacao->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $alimentacao->funcionario->nome }}</td>
                        <td>R${{ $alimentacao->valor }}</td>
                        <td>{{ optional($alimentacao->data_alimentacao)->format("d/m/Y") }}</td>
                        <td>{{ $alimentacao->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $alimentacoes->links() }}
        
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