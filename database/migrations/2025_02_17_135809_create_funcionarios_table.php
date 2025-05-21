<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->char('cpf', 14);
            $table->char('rg');
            $table->char('pis');
            $table->char('ctps');
            $table->char('telefone');
            $table->char('status', 1)->default(0)->comment('A - Ativo / D - Desligado');
            $table->char('contrato', 1)->default(0)->comment('C - CLT / A - Avulso');
            $table->date('data_contratacao');
            $table->date('data_rescisao')->default("3000-01-01");
            $table->unsignedBigInteger('centrocusto_id')->nullable();
            $table->foreign('centrocusto_id')
                ->references('id')
                ->on('centrocustos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('cargo_id')->nullable();    
            $table->foreign('cargo_id')
                ->references('id')
                ->on('cargos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('locacao_id')->nullable();    
            $table->foreign('locacao_id')
                ->references('id')
                ->on('locacoes')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            //$table->foreign('id')->references('id')->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}
