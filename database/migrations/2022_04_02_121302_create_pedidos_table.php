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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('nome');
            $table->string('email');
            $table->string('cpf');

            $table->string('cep');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('complemento');
            $table->string('cidade');
            $table->string('estado');

            // $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('produto_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('pedidos');
    }
};
