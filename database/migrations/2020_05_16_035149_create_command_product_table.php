<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commands_id')->unsigned();
            $table->integer('products_id')->unsigned();

            $table->foreign('commands_id')->references('id')->on('commands')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('command_product');
    }
}
