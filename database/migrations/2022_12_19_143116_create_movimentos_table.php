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
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id();
            $table->string('observacao')->nullable();
            $table->string('status')->default('Não Concluido');
            $table->date('data_movimento');
            $table->date('data_conclusao')->nullable();

            $table->unsignedInteger('servidor_destino_id');
            $table->foreign('servidor_destino_id')->references('id')->on('servidors');

            $table->unsignedInteger('servidor_origem_id');
            $table->foreign('servidor_origem_id')->references('id')->on('servidors');


            $table->unsignedInteger('tipo_movimento_id');
            $table->foreign('tipo_movimento_id')->references('id')->on('tipo_movimentos');

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
        Schema::dropIfExists('movimentos');
    }
};
