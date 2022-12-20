<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nome');
            $table->string('tipo');
            $table->string('nota_fiscal')->nullable(); //VerificarDepois
            $table->string('descricao');

            $table->unsignedInteger('servidor_id');
            $table->foreign('servidor_id')->references('id')->on('servidors');

            $table->unsignedInteger('setor_id')->nullable();
            $table->foreign('setor_id')->references('id')->on('setors');

            $table->unsignedInteger('classificacao_id');
            $table->foreign('classificacao_id')->references('id')->on('classificacaos');

            $table->unsignedInteger('origem_id');
            $table->foreign('origem_id')->references('id')->on('origems');

            $table->unsignedInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas');

            $table->unsignedInteger('situacao_id');
            $table->foreign('situacao_id')->references('id')->on('situacaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patrimonios');
    }
};
