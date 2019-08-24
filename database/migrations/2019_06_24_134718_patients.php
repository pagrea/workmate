<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Patients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema Patients
        if(!Schema::hastable('patients')){ //check if table does not exist then create new
        Schema::create('patients', function(Blueprint $table){
            $table->increments('id', true);
            $table->string('lastname');
            $table->string('firstname');
            $table->string('gender');
            $table->date('birthdate');
            $table->string('UpdatedBy')->nullable();
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
        Schema::dropIfExists('patients');

        
    }
}
