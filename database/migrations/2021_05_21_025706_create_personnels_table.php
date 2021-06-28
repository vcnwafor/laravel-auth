<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('employeeno', 100);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('firstname', 400);
            $table->string('middlename', 400)->nullable();
            $table->string('lastname', 400);
            $table->enum('sex', ["Male","Female"]);
            $table->longText('image')->nullable();
            $table->longText('skills')->nullable();
            $table->string('phone', 100);
            $table->string('email', 450);
            $table->string('address', 500);
            $table->string('designation', 400)->nullable();
            $table->string('country', 60)->nullable();
            $table->decimal('salary', 14, 2)->default(0);
            $table->enum('maritalstatus', ["Married","Single","Separated","Divorced"]);
            $table->enum('employmentstatus', ["Active","Disengaged","Sacked"]);
            $table->enum('employmenttype', ["Fulltime","Contract","Consultant"]);
            $table->dateTime('dob');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
