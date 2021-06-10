<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_cases', function (Blueprint $table) {
            $table->id();
            $table->integer('totalInWorld');
            $table->integer('detectInlast24hours');
            $table->integer('deathInlast24hours');
            $table->integer('totalDeath');
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
        Schema::dropIfExists('global_cases');
    }
}
