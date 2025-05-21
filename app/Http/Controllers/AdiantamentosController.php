<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adiantamentos;
use Carbon\Carbon;
use App\Http\Requests\AdiantamentosRequest;
use App\Services\UploadService;
use App\Models\Funcionarios;


class AdiantamentosController extends Controller
{
    
public function index()
{
    $adiantamento = Adiantamentos::all();
    
    $adiantamento = Adiantamentos::Paginate(10);

    return view('adiantamentos.index', [
        'adiantamentos' => $adiantamento 
    ]);
    
}

public function create()
{
    $adiantamento = Adiantamentos::all();

    $funcionario = Funcionarios::all();

    return view('adiantamentos.create', [
        'adiantamentos' => $adiantamento,
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),              
    ]);
}

public function store(AdiantamentosRequest $request)
{
    $adiantamento = $request->all();
    
    Adiantamentos::create($adiantamento);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit($adiantamento)
{
    //$adiantamento = Adiantamentos::findOrFail($adiantamento);
    //
    //return view('adiantamento_edit', [
    //    'adiantamentos' => $adiantamento
    //]);
}

public function update($adiantamento, Request $request)
{
    //$gasolina = Gasolina::findOrFail($gasolina);
    //$dados = $request->all();
    //$dados['data_vale'] = Carbon::createFromFormat("d/m/Y", $dados['data_vale'])->format("Y-m-d");
    //
    //$gasolina->update($dados);
    //
    //return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
}

public function delete($adiantamento)
{
    $adiantamento = Adiantamentos::findOrFail($adiantamento);
    $adiantamento->delete();

    return redirect('adiantamentos.index')->with('mensagem', 'Registro excluído com sucesso!');
}

}
