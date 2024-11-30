<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'clientes';
    

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function boleta()
    {
        return $this->belongsTo(Boleta::class);
    }

    public function getStatusFormatadoAttribute()
    {
        if ($this->status == "A") {
            return "Ativo";
        } else if ($this->status == "I") {
            return "Inativo";
        }
    }

}


