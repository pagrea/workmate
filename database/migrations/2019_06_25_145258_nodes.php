<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hastable('nodes')){  //check if table does not exist then create new
        Schema::create('nodes', function(Blueprint $table){
            $table->increments('id', true);
            $table->bigInteger('answer_type_id')->unsigned();
            $table->string('label_translations')->nullable();
            $table->string('reference')->nullable();
            $table->string('priority')->nullable();
            $table->string('description_translations')->nullable();
            $table->string('min_score')->nullable();
            $table->integer('algorithm_id')->nullable();
            $table->integer('final_diagnostic_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('diagnostic_id')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

       /*  Schema::table('nodes', function($table) {
            $table->foreign('answer_type_id')->references('id')->on('answer_types');
        }); */

       /*  Schema::table('answers', function($table) {
            $table->foreign('node_id')->references('id')->on('nodes');
        }); */
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
        Schema::dropIfExists('nodes');

    }
}
