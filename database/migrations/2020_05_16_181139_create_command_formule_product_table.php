<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandFormuleProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command_formule_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commands_id')->unsigned();
            $table->integer('formules_id')->unsigned();
            $table->integer('products_id')->unsigned();

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
        Schema::dropIfExists('command_formule_product');
    }
}
