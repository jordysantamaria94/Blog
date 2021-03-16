<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_subcategoria');
            $table->unsignedBigInteger('id_usuario');
            $table->string('titulo');
            $table->string('url');
            $table->string('descripcion_foto');
            $table->string('breve_descripcion');
            $table->text('descripcion');
            $table->text('etiquetas');
            $table->timestamps();

            $table->foreign('id_subcategoria')->references('id')->on('subcategoria');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
