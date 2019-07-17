<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_hotel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('facility_id')->nullable()->comment("Özelliğin id numarasını belirtir.");
            $table->unsignedBigInteger('hotel_id')->nullable()->comment("Otel id numarasını belirtir.");
            $table->boolean('is_paid')->default(false)->nullable()->comment("Ücretli olup olmadığını belirtir.");
            $table->timestamps();

            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
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
        Schema::dropIfExists('facility_hotel');
    }
}
