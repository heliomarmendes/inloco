<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacoes extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'locacoes';
    

    public function funcionario()
    {
        return $this->hasmany(Funcionario::class);
    }

    public function holerite()
    {
        return $this->hasMany(Holerites::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
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


