<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoleritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holerites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionarios_id')->nullable();
            $table->foreign('funcionarios_id')
                ->references('id')
                ->on('funcionarios')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('adiantamento_id')->nullable();
            $table->foreign('adiantamento_id')
                ->references('id')
                ->on('adiantamentos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('locacao_id')->nullable();
            $table->foreign('locacao_id')
                ->references('id')
                ->on('locacoes')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('cargo_id')
                ->references('id')
                ->on('cargos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
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
        Schema::dropIfExists('horelites');
    }
}
