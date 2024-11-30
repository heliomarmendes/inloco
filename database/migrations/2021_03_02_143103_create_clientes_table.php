<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->char('cnpj', 18);
            $table->char('telefone');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('uf', 2);
            $table->char('cep', 9);
            $table->char('status', 1)->default(0)->comment('A - Ativo / I - Inativo');
            $table->date('data_contrato');
            $table->date('data_rescisao');
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
        //Schema::dropIfExists('clientes');
    }
}
