<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->nullable();    
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->char('codigo_locacao');
            $table->string('descricao');
            $table->char('status', 1)->default(0)->comment('A - Ativo / I - Inativo');       
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
        Schema::dropIfExists('locacoes');
    }
}

