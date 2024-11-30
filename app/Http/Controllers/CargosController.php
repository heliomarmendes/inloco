<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargos;
use App\Models\Funcionarios;
use Carbon\Carbon;
use App\Http\Requests\CargosRequest;
use App\Services\UploadService;

class CargosController extends Controller
{

    public function index()
    {
        $cargo = Cargos::all();
    
        $cargo = Cargos:: Paginate(10);
    
        return view('cargos.index', [
            'cargos' => $cargo
        ]);
    }
    
    public function create()
    {
        $cargo = Cargos::all();
    
        return view('cargos.create', [
            'cargos' => $cargo
        ]);
    }
    
    public function store(CargosRequest $request)
    {
        $cargo = $request->all();
        
        Cargos::create($cargo);
    
        return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
    }
    
    public function edit($cargo)
    {
        $cargo = Cargos::findOrFail($cargo);
        
        return view('cargos.edit', [
            'cargos' => $cargo
        ]);
    }
    
    public function update($cargo, CargosRequest $request)
    {
        $cargo = Cargos::findOrFail($cargo);
        
        $dados = $request->all();
    
        $cargo->update($dados);
        
        return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
    }
    
    public function delete($cargo)
    {
        //
    }


}
