<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBdcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdcases', function (Blueprint $table) {
            $table->id();
            $table->string('country_case_name');
            $table->integer('activeCases');
            $table->integer('totalInBD');
            $table->integer('detectInlast24hours');
            $table->integer('deathInlast24hours');
            $table->integer('totalDeath');
            $table->integer('healedInlast24hours');
            $table->integer('totalHealed');
            $table->float('infectionRate24hours');
            $table->float('infectionRateTotal');
            $table->float('recoveryRate');
            $table->float('deathRate');
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
        Schema::dropIfExists('bdcases');
    }
}
