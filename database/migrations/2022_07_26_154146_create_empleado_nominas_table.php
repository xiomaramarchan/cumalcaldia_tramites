<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_nominas', function (Blueprint $table) {

            $table->id();
            /*$table->integer('nomina_id');            
            $table->integer('empleado_id');*/

            $table->double('sueldo_base');
            $table->double('sueldo_integral');
            $table->date('fecha_ingreso');
            $table->text('estatus');
            $table->text('cargo');
            $table->text('unidad_administrativa');
            $table->date('fecha_egreso');
            $table->foreignId('nomina_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('empleado_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('empleado_nominas');
    }
}
