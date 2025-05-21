<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Atestados extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'atestados';
    protected $dates = ['created_at', 'update_at', 'data_atestado'];
    

    public function funcionario()
    {
        return $this->belongsTo(Funcionarios::class);
    }

    public function holerite()
    {
        return $this->hasMany(Holerites::class);
    }
    


}


