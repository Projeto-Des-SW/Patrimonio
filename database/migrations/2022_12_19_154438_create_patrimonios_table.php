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
            $table->string('nota_fiscal')->nullable(); //VerificarDepois
            $table->string('descricao');
            $table->boolean('aprovado')->default(true);

            $table->date('data_compra')->nullable();
            $table->double('valor');

            $table->unsignedInteger('servidor_id');
            $table->foreign('servidor_id')->references('id')->on('servidores');

            $table->unsignedInteger('setor_id')->nullable();
            $table->foreign('setor_id')->references('id')->on('setores');

            $table->unsignedInteger('classificacao_id');
            $table->foreign('classificacao_id')->references('id')->on('classificacoes');

            $table->unsignedInteger('origem_id');
            $table->foreign('origem_id')->references('id')->on('origens');

            $table->unsignedInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas');

            $table->unsignedInteger('situacao_id');
            $table->foreign('situacao_id')->references('id')->on('situacoes');

            $table->string('observacao')->nullable();
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
