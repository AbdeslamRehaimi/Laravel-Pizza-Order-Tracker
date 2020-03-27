<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nom');
            $table->unsignedInteger('catID');
            $table->float('Prix');
            $table->integer('Remise');
            $table->dateTime('Date_Debut');
            $table->datetime('Date_Fin');
            $table->boolean('isPromo');
            $table->text('imgPath');

            $table->foreign('catID')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
