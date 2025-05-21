<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimentacoes;
use Carbon\Carbon;
use App\Http\Requests\AlimentacoesRequest;
use App\Services\UploadService;
use App\Models\Funcionarios;

class AlimentacoesController extends Controller
{


    public function index()
    {
        $alimentacao = Alimentacoes::all();
        
        $alimentacao = Alimentacoes::Paginate(10);
    
        return view('alimentacoes.index', [
            'alimentacoes' => $alimentacao 
        ]);
        
    }
    
    public function create()
    {
        $alimentacao = Alimentacoes::all();
    
        return view('alimentacoes.create', [
            'alimentacoes' => $alimentacao,
            'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),           
        ]);
    }
    
    public function store(AlimentacoesRequest $request)
    {
        $alimentacao = $request->all();
        
        Alimentacoes::create($alimentacao);
    
        return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
    }
    
    public function edit($alimentacao)
    {
        //$adiantamento = Adiantamentos::findOrFail($adiantamento);
        //
        //return view('adiantamento_edit', [
        //    'adiantamentos' => $adiantamento
        //]);
    }
    
    public function update($alimentacao, Request $request)
    {
        //$gasolina = Gasolina::findOrFail($gasolina);
        //$dados = $request->all();
        //$dados['data_vale'] = Carbon::createFromFormat("d/m/Y", $dados['data_vale'])->format("Y-m-d");
        //
        //$gasolina->update($dados);
        //
        //return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
    }
    
    public function delete($alimentacao)
    {
        $alimentacao = Alimentacoes::findOrFail($alimentacao);
        $alimentacao->delete();
    
        return redirect('alimentacoes.index')->with('mensagem', 'Registro excluído com sucesso!');
    }

}
