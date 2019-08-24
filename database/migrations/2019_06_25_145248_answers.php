<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Answers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hastable('answers')){ //check if table does not exist then create new
        Schema::create('answers', function(Blueprint $table){
            $table->increments('id', true);
            $table->integer('node_id')->unsigned();
            $table->integer('answer')->nullable();
            $table->string('value')->nullable();
            $table->string('operator')->nullable();
            $table->string('label_translations')->nullable();
            $table->string('reference')->nullable();
            $table->timestamps();
        });

    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('answers');

    }
}
