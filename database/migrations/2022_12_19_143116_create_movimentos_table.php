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

            $table->foreignId('servidor_destino_id')->constrainedTo('servidores');
            $table->foreignId('servidor_origem_id')->constrained('servidores');
            $table->foreignId('tipo_movimento_id')->constrainedTo('tipos_movimento');

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
