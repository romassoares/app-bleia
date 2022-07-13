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
        Schema::create('dizimos', function (Blueprint $table) {
            $table->id();
            $table->char('valor');
            $table->date('mes_referencia');

            $table->unsignedBigInteger('membros_id');
            $table->foreign('membros_id')->references('id')->on('membros');
            $table->unsignedBigInteger('ponto_id');
            $table->foreign('ponto_id')->references('id')->on('pontos');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dizimos');
    }
};
