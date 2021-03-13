<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Reported by
            $table->string('date'); // Time of the Incident
            $table->string('location'); // Location of the Incident
            $table->string('victim'); // Name of victim option value such as injuries, property, or weapons involved in the incident
            $table->string('description'); // option value such as injuries, property, or weapons involved in the incident
            $table->binary('image')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('incidents');
    }
}
