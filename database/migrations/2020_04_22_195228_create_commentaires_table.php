<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date_pub')->nullable();
            $table->text('texte')->nullable();
            $table->unsignedInteger('codeProduit')->nullable();
            $table->unsignedInteger('numClient')->nullable();

            $table->foreign('numClient')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('codeProduit')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('commentaires');
    }
}
