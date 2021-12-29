<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('codigo');
            $table->string('ubicacion');
            $table->string('retirado_por')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->integer('cantidad')->default(1);
            $table->string('Daño')->default('Sin Daños');

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
        Schema::dropIfExists('items');
    }
}
