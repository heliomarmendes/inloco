@extends('adminlte::page')

@section('title', 'HE50')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> HE50
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de HE50
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/he50.create/" class="btn btn-primary mb-5">Novo Lançamento</a>
    
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Ações</th>
                    <th>Funcionário</th>
                    <th>Valor</th>
                    <th>Data HE50</th>
                    <th>Qtd Horas</th>
                    <th>Observação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($HE50 as $HE50)
                    <tr class="text-center">
                        <td>
                            <form action="/he50/{{ $HE50->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $HE50->funcionario->nome }}</td>
                        <td>R$ {{ number_format($HE50->valor, 2, ",", "." ) }}</td>
                        <td>{{ optional($HE50->data_he50)->format("d/m/Y") }}</td>
                        <td>{{ number_format($HE50->horas, 2, ":", ":") }}h</td>
                        <td>{{ $HE50->observacao }}</td>
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