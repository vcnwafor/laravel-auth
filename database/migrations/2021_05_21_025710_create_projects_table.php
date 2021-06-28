<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 650);
            $table->longText('description')->nullable();
            $table->dateTime('startdate')->nullable();
            $table->dateTime('completiondate')->nullable();
            $table->foreignId('client_id')->constrained();
            $table->decimal('approvedamount', 14, 2)->default(0);
            $table->enum('status', ["Ongoing","Paused","Inspected","Completed","Delivered"]);
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
        Schema::dropIfExists('projects');
    }
}
