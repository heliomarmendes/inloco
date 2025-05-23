<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Cargos;
use App\Models\Atestados;
use App\Models\DadosBancarios;
use App\Models\CentroCustos;
use Illuminate\Support\Facades\DB;

class Funcionarios extends Model
{
    use HasFactory;


    const STATUS_ATIVO = "A";
    const STATUS_INATIVO = "D";
    const STATUS = [
        Funcionarios::STATUS_ATIVO => "Ativo",
        Funcionarios::STATUS_INATIVO => "Desligado"
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'funcionarios';
    protected $dates = ['created_at', 'update_ate', 'data_contratacao', 'data_rescisao'];


    public function faltas()
    {
        return $this->hasMany(Faltas::class);
    }

    public function atestados()
    {
        return $this->hasOne(Atestados::class)->withDefault(['funcionario_id' => '', 'data_atestado' => '', 'dias' => '', 'observacao' => '']);
    }

    public function dadosbancarios()
    {
        return $this->hasOne(DadosBancarios::class)->withDefault(['banco' => '', 'agencia' => '', 'conta' => '', 'pix' => '', 'favorecido' => '']);
    }

    public function alimentacao()
    {
        return $this->hasMany(Alimentacoes::class);
    }

    public function adiantamentos()
    {
        return $this->hasMany(Adiantamentos::class);
    } 

    public function holerite()
    {
        return $this->hasMany(Holerites::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class);
    }

    public function centrocusto()
    {
        return $this->belongsTo(CentroCustos::class);
    }

    public function locacao()
    {
        return $this->belongsTo(Locacoes::class);
    }

    public function getStatusFormatadoAttribute()
    {
        return Funcionarios::STATUS[$this->status];
    }

    public function getTipoContratoAttribute()
    {
        if ($this->contrato == "C") {
            return "CLT";
        } else if ($this->contrato == "A") {
            return "Avulso";
        }
    }

    public function getDataFormatadaAttribute($value)
    {
       $this->attributes['data_contratacao'] = Carbon::creatFromFormat("d/m/Y", $value)->format("Y-m-d");      
    }

    public function getAdiantamentos($data_inicio, $data_fim)
    {
        return Adiantamentos::where('funcionario_id', $this->id)
            ->when($data_inicio, function($query) use ($data_inicio) {
                $query->where('data_adiantamento', '>=', $data_inicio);
            })
            ->when($data_fim, function($query) use ($data_fim) {
                $query->where('data_adiantamento', '<=', $data_fim);
            })
            ->sum('valor');
    }

    public function getFaltas($data_inicio, $data_fim)
    {
        return Faltas::where('funcionario_id', $this->id)
            ->when($data_inicio, function($query) use ($data_inicio) {
                $query->where('data_falta', '>=', $data_inicio);
            })
            ->when($data_fim, function($query) use ($data_fim) {
                $query->where('data_falta', '<=', $data_fim);
            })
            ->sum('valor_falta');
    }

    public function getInss($data_inicio, $data_fim)
    {
        return Inss::where('funcionario_id', $this->id)
            ->when($data_inicio, function($query) use ($data_inicio) {
                $query->where('data_competencia', '>=', $data_inicio);
            })
            ->when($data_fim, function($query) use ($data_fim) {
                $query->where('data_competencia', '<=', $data_fim);
            })
            ->sum('valor_inss');
    }

    public function getPorcentagemInss($data_inicio, $data_fim)
    {
        return Inss::where('funcionario_id', $this->id)
            ->when($data_inicio, function($query) use ($data_inicio) {
                $query->where('data_competencia', '>=', $data_inicio);
            })
            ->when($data_fim, function($query) use ($data_fim) {
                $query->where('data_competencia', '<=', $data_fim);
            })
            ->sum('porcentagem');
    }

    public function getSalario($data_inicio, $data_fim)
    {
       $dataFim = Carbon::parse($data_fim);
       $dataInicio = Carbon::parse($data_inicio);
       $dataContratacao = Carbon::parse($this->data_contratacao);
        
        if ($dataFim->copy()->format('Y-m') == $dataContratacao->copy()->format('Y-m')) {
            $dias = $dataFim->diffInDays($dataContratacao);
            $diasMes = \DateTime::createFromFormat('d/m/Y', $dataFim);
            $dia = $dataFim->format('d');
            $salarioPorDia = $this->cargo->salario / 30;
            return $salarioPorDia * ($dias + 1);
            
        }
        return $this->cargo->salario;
    }
    
    public function getTransporteAtestado($data_inicio, $data_fim)
    {
        $dado = Atestados::where('funcionario_id', $this->id)
                ->when($data_inicio, function($query) use ($data_inicio) {
                    $query->where('data_atestado', '>=', $data_inicio);
                })
                ->when($data_fim, function($query) use ($data_fim) {
                    $query->where('data_atestado', '<=', $data_fim);
                })
                ->sum('valor_transporte');


            if ($dado > 0) {
                return $dado;
            } 

            return 0;
    }

    public function getAlimentacaoAtestado($data_inicio, $data_fim)
    {
        $dado = Atestados::where('funcionario_id', $this->id)
                ->when($data_inicio, function($query) use ($data_inicio) {
                    $query->where('data_atestado', '>=', $data_inicio);
                })
                ->when($data_fim, function($query) use ($data_fim) {
                    $query->where('data_atestado', '<=', $data_fim);
                })
                ->sum('valor_alimentacao');


            if ($dado > 0) {
                return $dado;
            } 

            return 0;
    }

    public function getInsalubridade($data_inicio, $data_fim)
    {
        $dataFim = Carbon::parse($data_fim);
        $dataContratacao = Carbon::parse($this->data_contratacao);

        if ($dataFim->copy()->format('Y-m') == $dataContratacao->copy()->format('Y-m')) {
            $dias = $dataContratacao->diffInDays($dataFim);
            $insalubridade = $this->cargo->insalubridade / 30;
            return $insalubridade * ($dias + 1);
        }

        return $this->cargo->insalubridade;
    }

    public function getAgencia($data_inicio, $data_fim)
    {
        $agencia = DadosBancarios::where('funcionario_id', $this->id)
                   ->when($data_fim, function($query) use ($data_fim) {
                    $query->where('created_at', '<=', $data_fim);
                   })
                   ->sum('agencia');

           if ($agencia > 0) {
                return $agencia;
            } 
           return 'Sem registro';
        
    }

    public function getPix($data_inicio, $data_fim)
    {
        $pix = DadosBancarios::where('funcionario_id', $this->id)
                   ->when($data_fim, function($query) use ($data_fim) {
                    $query->where('created_at', '<=', $data_fim);
                   })
                   ->sum('pix');

           if ($pix > 0) {
                return $pix;
            } 
           return 'Sem registro';
        
    }

    public function getBanco($data_inicio, $data_fim)
    {
        $banco = DadosBancarios::where('funcionario_id', $this->id)
                   ->when($data_fim, function($query) use ($data_fim) {
                    $query->where('created_at', '<=', $data_fim);
                   })
                   ->sum('banco');

           if ($banco > 0 ) {
                return $banco;
            } 
           return 'Sem registro';
        
    }

    public function getConta($data_inicio, $data_fim)
    {
        $conta = DadosBancarios::where('funcionario_id', $this->id)
                   ->when($data_fim, function($query) use ($data_fim) {
                    $query->where('created_at', '<=', $data_fim);
                   })
                   ->sum('conta');


            if ($conta > 0) {
                return $conta;
            } 

            return 'Sem registro';
    
    }

    

    public function getDesconto($data_inicio, $data_fim)
    {
        $desconto = DadosBancarios::where('funcionario_id', $this->id)
                   ->when($data_fim, function($query) use ($data_fim) {
                    $query->where('created_at', '<=', $data_fim);
                   })
                   ->sum('desconto');


            return $desconto;
    
    }


    public function getReferencia($data_inicio, $data_fim)
    {
        $dataFim = Carbon::parse($data_fim);

        if ($data = $dataFim->copy()->format('m-Y')){
            return $data;
        }

        return 0;
    }

    public function getHE50($data_inicio, $data_fim)
    {
        return HE50::where('funcionario_id', $this->id)
            ->when($data_inicio, function($query) use ($data_inicio) {
                $query->where('data_he50', '>=', $data_inicio);
            })
            ->when($data_fim, function($query) use ($data_fim) {
                $query->where('data_he50', '<=', $data_fim);
            })
            ->sum('valor');
    }

    public function getHorasHE50($data_inicio, $data_fim)
    {
        return HE50::where('funcionario_id', $this->id)
            ->when($data_inicio, function($query) use ($data_inicio) {
                $query->where('data_he50', '>=', $data_inicio);
            })
            ->when($data_fim, function($query) use ($data_fim) {
                $query->where('data_he50', '<=', $data_fim);
            })
            ->sum('horas');
    }

    
  

}

