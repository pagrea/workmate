<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema Patients
        if(!Schema::hastable('departments')){ //check if table does not exist then create new
        Schema::create('departments', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('DepartmentName')->nullable();
            $table->string('DepartmentDescription')->nullable();
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
        Schema::dropIfExists('departments');

        
    }
}
