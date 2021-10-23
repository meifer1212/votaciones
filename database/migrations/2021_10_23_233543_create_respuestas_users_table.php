<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_identificacion');
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('respuesta_id');
            $table->timestamps();
            $table->foreign('user_identificacion')->references('identificacion')->on('users');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('respuesta_id')->references('id')->on('respuestas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas_users');
    }
}
