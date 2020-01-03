<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hastable('users')){ //check if table does not exist then create new
        Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('EmployeeID')->unique();
                $table->string('FirstName')->nullable();
                $table->string('LastName')->nullable();
                $table->date('Dob')->nullable();
                $table->string('Gender')->nullable();
                $table->string('JobTitle')->nullable();
                $table->string('highest_education_level')->nullable();
                $table->date('DateOfEmployment')->nullable();
                $table->date('DateOfLastPromotion');
                $table->string('MaritalStatus')->nullable();
                $table->integer('LeaveBalance')->nullable();
                $table->string('Nationality')->nullable();
                $table->string('NationalIDNum')->nullable();
                $table->string('BirthCertificateNum')->nullable();
                $table->string('CurrentStatus')->nullable();
                $table->string('Department')->nullable();
                $table->string('AbsorbedInNIMR')->nullable();
                $table->string('UserRole')->nullable();
                $table->string('email')->unique();
                $table->string('OtherEmail')->nullable();
                $table->string('PhoneNumber')->nullable();
                $table->string('EmegencyContantPerson')->nullable();
                $table->string('EmegencyContactNumber')->nullable();
                $table->string('StaffCurrentAddress')->nullable();
                $table->string('StaffHomeAddress')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('UpdatedBy')->nullable();
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
