<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmecCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smec_cases', function (Blueprint $table) {
            $table->id();
            $table->integer('totalInSmec');
            $table->integer('detectInlast24hours');
            $table->integer('deathInlast24hours');
            $table->integer('totalDeath');
            $table->integer('healedInlast24hours');
            $table->integer('totalHealed');
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
        Schema::dropIfExists('smec_cases');
    }
}
