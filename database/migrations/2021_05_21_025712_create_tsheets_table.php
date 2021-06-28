<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTsheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('tsheets', function (Blueprint $table) {
            $table->id();
            $table->longText('description')->nullable();
            $table->longText('image')->nullable();
            $table->string('completion', 50)->nullable();
            $table->dateTime('startdate')->nullable();
            $table->dateTime('enddate')->nullable();
            $table->enum('status', ["Pending","Rejected","Approved","Paid"]);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('pteam_id')->constrained();
            $table->foreignId('personnel_id')->constrained();
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
        Schema::dropIfExists('tsheets');
    }
}
