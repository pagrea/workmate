<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicalCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Settings Migration for Medical Cases
        if(!Schema::hastable('medical_cases')){ //check if table does not exist then create new
        Schema::create('medical_cases', function(Blueprint $table){
            $table->increments('id', true);
            $table->json('medicalCaseJson')->nullable();
            $table->integer('medicalCase_id')->nullable();
            $table->date('createdDate');
            $table->string('status');
            $table->timestamps();
        });

        /*  Schema::table('medical_cases', function($table) {
            $table->foreign('patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('medical_cases');
    }
}
