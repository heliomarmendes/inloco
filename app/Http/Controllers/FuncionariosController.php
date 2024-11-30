<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    
    public function index()
    {
        $funcionario = Funcionarios::all();
        
        return view('index');
    }


}
