<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tour_id')->nullable()->comment("Tur id sini belirtir.");
            $table->string('title')->nullable()->comment("Tur günün adını belirtir.");
            $table->longText('description')->nullable()->comment("Tur günün açıklamasını belirtir.");
            $table->integer('rank')->nullable()->comment("Tur günün sırasını belirtir.");
            $table->timestamps();

            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_days');
    }
}
