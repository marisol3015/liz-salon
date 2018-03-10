<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_id')->unsigned();
            $table->integer('producto_id')->unsigned()->index();
            $table->integer('cantidad');
            $table->float('precio');
            $table->float('sub_total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('orden_id')->references('id')->on('ordenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ordenes');
    }
}