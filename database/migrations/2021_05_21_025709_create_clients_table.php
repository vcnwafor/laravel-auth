<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('businessname', 100);
            $table->string('firstname', 400)->nullable();
            $table->string('middlename', 400)->nullable();
            $table->string('lastname', 400)->nullable();
            $table->enum('sex', ["Male","Female"]);
            $table->longText('image')->nullable();
            $table->string('phone', 100);
            $table->string('email', 450);
            $table->string('address', 500)->nullable();
            $table->string('website', 500)->nullable();
            $table->string('rcno', 500)->nullable();
            $table->string('industry', 400)->nullable();
            $table->string('country', 60)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
