<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locacoes;
use App\Models\Funcionarios;
use Carbon\Carbon;
use App\Http\Requests\LocacoesRequest;
use App\Services\UploadService;
use App\Models\Clientes;

class LocacoesController extends Controller
{
    
public function index()
{
    $locacao = Locacoes::all();

    $locacao = Locacoes:: Paginate(10);

    return view('locacoes.index', [
        'locacoes' => $locacao
    ]);
}

public function create()
{
    $locacao = Locacoes::all();

    $cliente = Clientes::all();

    return view('locacoes.create', [
        'locacoes' => $locacao,
        'clientes' => $cliente
    ]);
}

public function store(LocacoesRequest $request)
{
    $locacao = $request->all();
    
    Locacoes::create($locacao);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit($locacao)
{
    $locacao = Locacoes::findOrFail($locacao);

    $cliente = Clientes::all();
    
    return view('locacoes.edit', [
        'locacao' => $locacao,
        'clientes' => $cliente
    ]);
}

public function update($locacao, LocacoesRequest $request)
{
    $locacao = Locacoes::findOrFail($locacao);
    
    $dados = $request->all();

    $locacao->update($dados);
    
    return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
}

public function delete($locacao)
{
    //
}


}
