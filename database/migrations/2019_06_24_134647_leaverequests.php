<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Leaverequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Settings Migration for Medical Cases
        if(!Schema::hastable('leaverequests')){ //check if table does not exist then create new
        Schema::create('leaverequests', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('EmployeeID')->nullable();
            $table->string('DepartmentID')->nullable();
            $table->date('RequestDate');
            $table->date('StartDate');
            $table->integer('DaysRequested');
            $table->date('EndDate');
            $table->string('TypeOfLeave');
            $table->string('Substitute');
            $table->string('ContactTelephone');
            $table->string('RequestStatus');
            $table->string('decline_reason');
            $table->integer('DaysApproved');
            $table->string('UpdatedBy');
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
        Schema::dropIfExists('leaverequests');
    }
}
