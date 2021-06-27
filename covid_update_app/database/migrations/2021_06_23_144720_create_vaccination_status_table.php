<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_status', function (Blueprint $table) {
            $table->id();
            $table->string('country_name');
            $table->integer('first_dose_taken');
            $table->integer('both_dose_taken');
            $table->integer('above_45');
            $table->integer('below_45');
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
        Schema::dropIfExists('vaccination_status');
    }
}
