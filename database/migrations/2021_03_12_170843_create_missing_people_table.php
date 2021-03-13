<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissingPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_people', function (Blueprint $table) {
            $table->id();
            $table->string('reportedBy');
            $table->string('name');
            $table->string('relationship');
            $table->string('mobile');
            $table->string('location');
            $table->string('time');
            $table->string('date');
            $table->string('status');
            $table->longText('description');
            $table->binary('image');
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
        Schema::dropIfExists('missing_people');
    }
}
