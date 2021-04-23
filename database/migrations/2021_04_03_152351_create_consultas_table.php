<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id('no_consulta');
            $table->string('no_control');
            $table->unsignedBigInteger('cedula');
            $table->date('fecha_consulta');
            $table->string('descripcion');
            $table->string('cod_m');

            $table->foreign('no_control')->references('no_control')->on('alumnos');
            $table->foreign('cedula')->references('cedula')->on('medicos');
            $table->foreign('cod_m')->references('nombre')->on('medicamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
