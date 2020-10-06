<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration
{
    /**
     * Funcion que se ejecuta para la migracion
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
        });
    }

    /**
     * Funcion que revierte los cambios en caso de fallos
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
