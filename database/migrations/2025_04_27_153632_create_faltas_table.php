<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faltas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->foreign('funcionario_id')
                ->references('id')
                ->on('funcionarios')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->date('data_falta');
            $table->char('valor_falta');
            $table->char('observacao',255);
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
        Schema::dropIfExists('faltas');
    }
}
