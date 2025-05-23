<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHe50Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('he50', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->foreign('funcionario_id')
                ->references('id')
                ->on('funcionarios')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->date('data_he50');
            $table->float('horas');
            $table->float('valor');
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
        Schema::dropIfExists('he50');
    }
}
