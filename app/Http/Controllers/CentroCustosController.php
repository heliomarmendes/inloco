<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroCustos;
use App\Models\Funcionarios;
use Carbon\Carbon;
use App\Http\Requests\CentroCustosRequest;
use App\Services\UploadService;

class CentroCustosController extends Controller
{
    public function index()
{
    $centrocusto = CentroCustos::all();

    $centrocusto = CentroCustos:: Paginate(10);

    return view('custos.index', [
        'centrocustos' => $centrocusto
    ]);
}

public function create()
{
    $centrocusto = CentroCustos::all();

    return view('custos.create', [
        'custos' => $centrocusto
    ]);
}

public function store(CentroCustosRequest $request)
{
    $centrocusto = $request->all();
    
    CentroCustos::create($centrocusto);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit($centrocusto)
{
    $centrocusto = CentroCustos::findOrFail($centrocusto);
    
    return view('custos.edit', [
        'custos' => $centrocusto
    ]);
}

public function update($centrocusto, CentroCustosRequest $request)
{
    $centrocusto = CentroCustos::findOrFail($centrocusto);
    
    $dados = $request->all();

    $centrocusto->update($dados);
    
    return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
}

public function delete($centrocusto)
{
    //
}

}

