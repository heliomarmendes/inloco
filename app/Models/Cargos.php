<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'cargos';


    public function funcionario()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function holerite()
    {
        return $this->hasMany(Holerites::class);
    }


}

