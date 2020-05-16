<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('numClient');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->text('adressLiv')->nullable();
            $table->string('type')->nullable();
            $table->boolean('realise')->nullable();
            $table->string('secteur')->nullable();

            $table->foreign('numClient')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('commands');
    }
}
