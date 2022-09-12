<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 8)->unique();            
            $table->text('nombres');
            $table->text('apellidos');
            $table->text('cargo');
            $table->date('fecha_nombramiento');
            $table->text('titulo_academico');
            $table->text('resolucion');
            $table->text('firma');
            $table->text('otro');
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
        Schema::dropIfExists('director');
    }
}
