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
            $table->increments('no_consulta');
            $table->unsignedInteger('no_control');
            $table->unsignedInteger('cedula');
            $table->date('fecha_consulta');
            $table->string('descripcion', 80);
            $table->string('cod_m', 8);

            $table->foreign('no_control')->references('no_control')->on('alumnos');
            $table->foreign('cedula')->references('cedula')->on('medicos');
            $table->foreign('cod_m')->references('cod_m')->on('medicamentos');
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
