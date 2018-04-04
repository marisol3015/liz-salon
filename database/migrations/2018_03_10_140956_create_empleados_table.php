<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('documento')->unique();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('usuario')->nullable();
            $table->string('contrasena')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}