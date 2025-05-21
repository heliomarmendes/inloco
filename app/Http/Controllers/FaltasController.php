<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faltas;
use Carbon\Carbon;
use App\Http\Requests\FaltasRequest;
use App\Services\UploadService;
use App\Models\Funcionarios;

class FaltasController extends Controller
{

public function index()
{
    $falta = Faltas::all();

    $falta = Faltas:: Paginate(10);

    return view('faltas.index', [
        'faltas' => $falta
    ]);
}

public function create()
{
    $falta = Faltas::all();

    return view('faltas.create', [
        'faltas' => $falta,
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),     
    ]);
}

public function store(FaltasRequest $request)
{
    $falta = $request->all();
    
    Faltas::create($falta);

    return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
}

public function delete($falta)
{
    $falta = Faltas::findOrFail($falta);
    $falta->delete();

    return redirect('/faltas.index')->with('mensagem', 'Registro excluído com sucesso!');
}

}
