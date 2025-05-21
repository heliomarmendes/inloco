@extends('adminlte::page')

@section('title', 'Dados Bancários')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Dados Bancários
    <small class="text-muted"></small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Dados Bancários
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/dadosbancarios.create/" class="btn btn-primary mb-5">Inserir Dados Bancários</a>
    
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Ações</th>
                    <th>Funcionário</th>
                    <th>Banco</th>
                    <th>Agência</th>
                    <th>Conta</th>
                    <th>PIX</th>
                    <th>Favorecido</th>
                    <th>Desconto</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dadosbancarios as $dadobancario)
                    <tr class="text-center">
                        <td>
                            <form action="/dadosbancarios/{{ $dadobancario->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $dadobancario->funcionario->nome }}</td>
                        <td>{{ $dadobancario->banco }}</td>
                        <td>{{ $dadobancario->agencia }}</td>
                        <td>{{ $dadobancario->conta }}</td>
                        <td>{{ $dadobancario->pix }}</td>
                        <td>{{ $dadobancario->favorecido }}</td>
                        <td>R${{ $dadobancario->desconto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $dadosbancarios->links() }}        

        
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