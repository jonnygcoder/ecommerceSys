<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->double('precio_uni')->nullable();
            $table->integer('stock_ini')->nullable();
            $table->integer('stock_act')->nullable();
            $table->string('unidad_med')->nullable();
            $table->integer('id_categoria')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('estado')->nullable()->default(0);
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
        Schema::dropIfExists('productos');
    }
};
