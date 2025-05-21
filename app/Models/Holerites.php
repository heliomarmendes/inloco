<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Holerites extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'holerites';
    protected $dates = ['created_at', 'update_at'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionarios::class);
    }

    public function adiantamento()
    {
        return $this->belongsTo(Adiantamentos::class);
    }

    public function dadosbancarios()
    {
        return $this->belongsTo(DadosBancarios::class);
    }

    public function atestados()
    {
        return $this->belongsTo(Atestados::class);
    }

    public function faltas()
    {
        return $this->belongsTo(Faltas::class);
    }

    public function locacao()
    {
        return $this->belongsTo(Locacoes::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class);
    }

}
