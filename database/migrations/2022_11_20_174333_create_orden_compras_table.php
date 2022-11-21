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
        Schema::create('orden_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente');
            $table->string('departamento')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('distrito')->nullable();
            $table->string('calle')->nullable();
            $table->dateTime('fecha_entrega')->nullable();
            $table->double('monto_total')->nullable();
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
        Schema::dropIfExists('orden_compras');
    }
};
