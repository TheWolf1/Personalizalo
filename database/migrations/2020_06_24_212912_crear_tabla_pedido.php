<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('cedula',10)->nullable();
            $table->string('telefono',10);
            $table->string('fecha',12)->nullable();
            $table->longText('descripcion');
            $table->double('abono',5,2)->nullable();
            $table->double('total',5,2);
            $table->string('estado',15);
            $table->string('productos',200);
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
        Schema::dropIfExists('pedido');
    }
}
