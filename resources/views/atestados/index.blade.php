@extends('adminlte::page')

@section('title', 'Atestados')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Atestados
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Atestados
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/atestados.create/" class="btn btn-primary mb-5">Novo Atestado</a>
    
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Ações</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Dias</th>
                    <th>Valor Transporte</th>
                    <th>Valor Alimentação</th>
                    <th>Observação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($atestados as $atestado)
                    <tr class="text-center">
                        <td>
                            <form action="/atestados/{{ $atestado->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $atestado->funcionario->nome }}</td>
                        <td>{{ optional($atestado->data_atestado)->format("d/m/Y") }}</td>
                        <td>{{ $atestado->dias }}</td>
                        <td>R${{ $atestado->valor_transporte }}</td>
                        <td>R${{ $atestado->valor_alimentacao }}</td>
                        <td>{{ $atestado->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $atestados->links() }}        

        
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