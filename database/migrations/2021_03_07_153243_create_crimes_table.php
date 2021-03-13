<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('occupation')->nullable();
            $table->string('sex');
            $table->string('eyes');
            $table->string('hair');
            $table->string('height');
            $table->string('weight');
            $table->string('date'); // DATE OF ARREST
            $table->string('time'); // TIME OF ARREST
            $table->string('location'); // LOCATION OF THE ARREST
            $table->string('bail'); // SET ARREST BAIL 
            $table->string('crime_type'); // SET ARREST BAIL 
            $table->string('description'); // DESCRIPTION 
            $table->binary('image')->nullable(); 
            $table->enum('status', ['Pending', 'Completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crimes');
    }
}
