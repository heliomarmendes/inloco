<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atestados;
use Carbon\Carbon;
use App\Http\Requests\AtestadosRequest;
use App\Services\UploadService;
use App\Models\Funcionarios;

class AtestadosController extends Controller
{


public function index()
{
    $atestado = Atestados::all();

    $atestado = Atestados:: Paginate(10);

    return view('atestados.index', [
        'atestados' => $atestado
    ]);
}

public function create()
{
    $atestado = Atestados::all();

    return view('atestados.create', [
        'atestados' => $atestado,
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),     
    ]);
}

public function store(AtestadosRequest $request)
{
    $atestado = $request->all();
    
    Atestados::create($atestado);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function delete($atestado)
{
    $atestado = Atestados::findOrFail($atestado);
    $atestado->delete();

    return redirect('/atestados.index')->with('mensagem', 'Registro excluído com sucesso!');
}
}
