<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicalCaseAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hastable('medical_case_answers')){ //check if table does not exist then create new
        Schema::create('medical_case_answers', function(Blueprint $table){
            $table->increments('id', true);
            $table->integer('medical_case_id')->unsigned();
            $table->integer('answer')->nullable();
            $table->string('value')->nullable();
            $table->string('reference')->nullable();
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::table('medical_case_answers', function($table) {
            $table->foreign('medical_case_id')->references('id')->on('medical_cases');
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
        Schema::dropIfExists('medical_case_answers');

    }
}
