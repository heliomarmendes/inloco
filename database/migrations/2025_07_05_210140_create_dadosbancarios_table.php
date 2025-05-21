<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dadosbancarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->foreign('funcionario_id')
                ->references('id')
                ->on('funcionarios')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->char('banco',255);
            $table->char('agencia',10);
            $table->char('conta',10);
            $table->char('pix',255);
            $table->char('favorecido',255);
            $table->char('desconto')->default(0);
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
        Schema::dropIfExists('dadosbancarios');
    }
}
