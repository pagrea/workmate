<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dependants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema Patients
        if(!Schema::hastable('dependants')){ //check if table does not exist then create new
        Schema::create('dependants', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('dependant_number')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('relationship')->nullable();
            $table->string('updated_by')->nullable();
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
