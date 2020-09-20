<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country')->unique();
            $table->integer('cases')->nullable();
            $table->integer('todayCases')->nullable();
            $table->integer('deaths')->nullable();
            $table->integer('todayDeaths')->nullable();
            $table->integer('recovered')->nullable();
            $table->integer('active')->nullable();
            $table->integer('critical')->nullable();
            $table->integer('casesPerOneMillion')->nullable();
            $table->integer('deathsPerOneMillion')->nullable();
            $table->integer('totalTests')->nullable();
            $table->integer('testsPerOneMillion')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('lng')->nullable();
            $table->string('flag')->nullable();
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
        Schema::dropIfExists('countries');
    }
}
