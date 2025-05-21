<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inss;
use Carbon\Carbon;
use App\Http\Requests\InssRequest;
use App\Services\UploadService;
use App\Models\Funcionarios;

class InssController extends Controller
{
    

public function index()
{
    $inss = Inss::all();

    return view('inss.index', [
        'inss' => $inss
    ]);
}

public function create()
{
    $inss = Inss::all();

    return view('inss.create', [
        'inss' => $inss,
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),       
    ]);
}

public function store(InssRequest $request)
{
    $inss = $request->all();
    
    Inss::create($inss);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function edit($inss)
{

}

public function update($inss, InssRequest $request)
{

}

public function delete($inss)
{
    $inss = Inss::findOrFail($inss);
    $inss->delete();

    return redirect('/inss.index')->with('mensagem', 'Registro excluído com sucesso!');
}

}


