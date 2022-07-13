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
        Schema::create('membros', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->char('cpf');
            $table->char('rg');
            $table->enum('estado_civil', ['cas', 'sol', 'div', 'viu']);
            $table->string('naturalidade');
            $table->char('cep');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->integer('numero');

            $table->string('nome_mae');
            $table->string('nome_pai');

            $table->date('data_batismo');
            $table->date('data_nascimento');
            $table->date('data_consagracao');
            $table->date('data_emissão');

            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->unsignedBigInteger('ponto_id');
            $table->foreign('ponto_id')->references('id')->on('pontos');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('membros');
    }
};
