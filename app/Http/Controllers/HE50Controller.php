<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HE50;
use Carbon\Carbon;
use App\Http\Requests\HE50Request;
use App\Services\UploadService;
use App\Models\Funcionarios;

class HE50Controller extends Controller
{


    public function index()
    {
        $HE50 = HE50::all();
    
        return view('he50.index', [
            'HE50' => $HE50
        ]);
    }
    
    public function create()
    {
        $HE50 = HE50::all();
    
        return view('he50.create', [
            'HE50' => $HE50,
            'funcionarios' => Funcionarios::where('status', Funcionarios::STATUS_ATIVO)
                                    ->orderBy('nome', 'asc')
                                    ->get(),    
        ]);
    }
    
    public function store(HE50Request $request)
    {
        $HE50 = $request->all();
        
        HE50::create($HE50);
    
        return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
    }
    
    public function edit($HE50)
    {
    
    }
    
    public function update($HE50, HE50Request $request)
    {
    
    }
    
    public function delete($HE50)
    {
        $HE50 = HE50::findOrFail($HE50);
        $HE50->delete();
    
        return redirect('/he50.index')->with('mensagem', 'Registro excluído com sucesso!');
    }

}
