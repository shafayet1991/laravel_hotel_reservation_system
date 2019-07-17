<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_hotel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('feature_id')->nullable()->comment("Özellik id numarasını belirtir.");
            $table->unsignedBigInteger('hotel_id')->nullable()->comment("Otel id numarasını belirtir.");
            $table->timestamps();

            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_hotel');
    }
}
