<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionarios;
use App\Models\Adiantamentos;
use App\Models\Locacoes;
use App\Models\Holerites;
use App\Models\Cargos;
use App\Models\DadosBancarios;
use Carbon\Carbon;
use App\Services\UploadService;
use Illuminate\Support\Facades\DB;
use App\Services\FuncionariosService;
use Dompdf\Dompdf;


class HoleritesController extends Controller
{

public function index(Request $request)
{
// dd($request->data_inicio, $request->data_fim);
    // $funcionarios = FuncionariosService::folhaDePagamento($request);
    $funcionarios = Funcionarios::all();


    return view('holerites.index', [
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),
    ]);
}

public function listanormal(Request $request)
{
    $funcionarios = Funcionarios::all();

    //dd($funcionarios);
    return view('holerites.listanormal', [
        'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),
    ]);
}

public function pdf($funcionario)
{
    $funcionario = Funcionarios::findOrFail($funcionario);

    return \PDF::loadView('holerites.individual', [
                        'funcionarios' => $funcionario])
                ->setPaper('a4')
                ->stream('holerites.pdf');
}

public function pdflista(Request $request)
{
    $funcionarios = Funcionarios::all();

    return \PDF::loadView('holerites.lista', ['funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                ->orderBy('nome', 'asc')
                ->get()])
                ->setPaper('a4', 'landscape')
                ->stream('holerites.pdf');
}

}
