<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        * Crea la tabla de movimientos históricos del inventario haciendo una relación de uno a muchos entre
        * el artículo y los movimientos del mismo
        */
        Schema::create('histori_inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('amount')->unsigned();
            $table->date('date');

            $table->string('type', 10);
            $table->unsignedBigInteger('article_id');

            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade');
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
        Schema::dropIfExists('histori_inventories');
    }
}
