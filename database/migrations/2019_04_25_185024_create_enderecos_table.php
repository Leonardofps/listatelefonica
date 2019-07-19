<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uf', 10);
            $table->string('nome_rua', 255);
            $table->string('cidade', 70);
            $table->string('bairro', 50);
            $table->string('estado', 30);
            $table->string('complemento', 20);
            $table->string('numero', 10);
            $table->integer('pessoa_end_id')->unsigned();
            $table->foreign('pessoa_end_id')->references('id')->on('pessoas')->onDelete('cascade');
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
        Schema::dropIfExists('enderecos');
    }
}
