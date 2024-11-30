<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Carbon\Carbon;
use App\Http\Requests\ClientesRequest;
use App\Services\UploadService;
use App\Models\Funcionario;

class ClientesController extends Controller
{
    
public function index()
{
    $cliente = Clientes::all();

    $cliente = Clientes::Paginate(10);

    return view('clientes.index', [
        'clientes' => $cliente
    ]);
}

public function create()
{
    $cliente = Clientes::all();


    return view('clientes.create', [
        'clientes' => $cliente,
    ]);
}

public function store(ClientesRequest $request)
{
    $cliente = $request->all();
    
    Clientes::create($cliente);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit($cliente)
{
    $cliente = Clientes::findOrFail($cliente);

    return view('clientes.edit', [
        'cliente' => $cliente
    ]);
}

public function update($cliente, ClientesRequest $request)
{
    $cliente = Clientes::findOrFail($cliente);
    $dados = $request->all();
    
    $cliente->update($dados);
    
    return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
}

public function delete($cliente)
{
    $cliente = Clientes::findOrFail($cliente);
    $cliente->delete();

    return redirect('/clientes.index')->with('mensagem', 'Registro excluído com sucesso!');
}

}
