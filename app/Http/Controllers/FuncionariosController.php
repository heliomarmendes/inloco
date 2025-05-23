<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionarios;
use App\Models\Cargos;
use App\Models\Locacoes;
use App\Models\CentroCustos;
use App\Models\DadosBancarios;
use Carbon\Carbon;
use App\Http\Requests\FuncionariosRequest;
use App\Services\UploadService;

class FuncionariosController extends Controller
{
    
public function index()
{
    $funcionario = Funcionarios::all(); 

    $dadosBancarios = DadosBancarios::all();

    return view('funcionarios.index', [
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),
        'dadosBancarios' => $dadosBancarios
    ]);
}

public function create()
{
    $funcionario = Funcionarios::all();

    $cargo = Cargos::all();

    $locacao = Locacoes::all();

    $dadosBancarios = DadosBancarios::all();

    $centrocusto = CentroCustos::all();

    return view('funcionarios.create', [
        'funcionarios' => $funcionario,
        'cargos' => $cargo,
        'locacoes' => $locacao,
        'dadosBancarios' => $dadosBancarios,
        'centrocustos' => $centrocusto
    ]);
}

public function store(FuncionariosRequest $request)
{
    $funcionario = $request->all();
    
    Funcionarios::create($funcionario);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit($funcionario)
{
    $funcionario = Funcionarios::findOrFail($funcionario);

    $cargo = Cargos::all();
    
    $locacao = Locacoes::all();

    $centrocusto = CentroCustos::all();

    return view('funcionarios.edit', [
        'funcionario' => $funcionario,
        'cargos' => $cargo,
        'locacoes' => $locacao,
        'centrocustos' => $centrocusto
    ]);
}

public function update($funcionario, FuncionariosRequest $request)
{
    $funcionario = Funcionarios::findOrFail($funcionario);
    $dados = $request->all();
        
    $funcionario->update($dados);
    
    return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
}

public function delete($funcionario)
{
    $funcionario = Funcionarios::findOrFail($funcionario);
    $funcionario->delete();

    return redirect('/funcionarios.index')->with('mensagem', 'Registro excluído com sucesso!');
}

public function show(Funcionarios $funcionario)
{
    
    return $funcionario;
    
}


}
