<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWantedPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wanted_people', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('reward')->nullable();
            $table->string('criminal_case');
            $table->string('offense');
            $table->string('issuing_court');
            $table->string('sex');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('hair')->nullable();
            $table->string('eye')->nullable();
            $table->string('complexion')->nullable();
            $table->string('other')->nullable();
            $table->string('age')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('citizen')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('address')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('elementary')->nullable();
            $table->string('secondary')->nullable();
            $table->string('college')->nullable();
            $table->string('status');
            $table->binary('image')->nullable();
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
        Schema::dropIfExists('wanted_people');
    }
}
