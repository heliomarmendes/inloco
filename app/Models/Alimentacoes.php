<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Alimentacoes extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'alimentacoes';
    protected $dates = ['created_at', 'update_at', 'data_alimentacao'];
    

    public function funcionario()
    {
        return $this->belongsTo(Funcionarios::class);
    }

    public function holerite()
    {
        return $this->hasMany(Holerites::class);
    }

    


}


