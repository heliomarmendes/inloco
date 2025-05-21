@extends('adminlte::page')

@section('title', 'Faltas')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Faltas
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Faltas
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/faltas.create/" class="btn btn-primary mb-5">Nova Falta</a>
    
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Ações</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Observação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($faltas as $falta)
                    <tr class="text-center">
                        <td>
                            <form action="/faltas/{{ $falta->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $falta->funcionario->nome }}</td>
                        <td>{{ optional($falta->data_falta)->format("d/m/Y") }}</td>
                        <td>R${{ $falta->valor_falta }}</td>
                        <td>{{ $falta->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $faltas->links() }}        

        
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