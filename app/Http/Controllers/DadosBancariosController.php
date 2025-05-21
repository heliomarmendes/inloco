<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DadosBancarios;
use Carbon\Carbon;
use App\Http\Requests\DadosBancariosRequest;
use App\Services\UploadService;
use App\Models\Funcionarios;

class DadosBancariosController extends Controller
{

public function index()
{
    $dadosbancarios = DadosBancarios::all();

    $dadosbancarios = DadosBancarios:: Paginate(10);

    return view('dadosbancarios.index', [
        'dadosbancarios' => $dadosbancarios
    ]);
}

public function create()
{
    $dadosbancarios = DadosBancarios::all();

    return view('dadosbancarios.create', [
        'dadosbancarios' => $dadosbancarios,
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),        
    ]);
}

public function store(DadosBancariosRequest $request)
{
    $dadosbancarios = $request->all();
    
    DadosBancarios::create($dadosbancarios);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit($dadosbancarios)
{

}

public function update($dadosbancarios, DadosBancariosRequest $request)
{

}

public function delete($dadosbancarios)
{
    $dadosbancarios = DadosBancarios::findOrFail($dadosbancarios);
    $dadosbancarios->delete();

    return redirect('/dadosbancarios.index')->with('mensagem', 'Registro excluído com sucesso!');
}

}

