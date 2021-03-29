<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        *  Crea la tabla articulos con sus respectivos campos
        */
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unsigned();
            $table->text('description');
            $table->integer('inventario');
            $table->string('street', 150);
            $table->string('city', 150);
            $table->string('province', 150);
            $table->string('country', 150);
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
        Schema::dropIfExists('articles');
    }
}
