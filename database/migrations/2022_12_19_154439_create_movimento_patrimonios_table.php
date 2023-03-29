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
        Schema::create('movimento_patrimonios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('movimento_id');
            $table->foreign('movimento_id')->references('id')->on('movimentos')->onDelete('cascade');

            $table->unsignedBigInteger('patrimonio_id');
            $table->foreign('patrimonio_id')->references('id')->on('patrimonios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimento_patrimonios');
    }
};
