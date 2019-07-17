<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomPersonDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_person_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id')->comment('Oda id numarasını belirtir.');
            $table->integer('adult_count')->comment('Yetişkin kisi sayisini (fiyat hesaplama için) belirtir. ');
            $table->integer('first_range_count')->default(0)->comment('1. çocuğun kisi sayisini (fiyat hesaplama için) belirtir. ');
            $table->integer('second_range_count')->default(0)->comment('2. çocuğun kisi sayisini bilgisini (fiyat hesaplama için) belirtir. ');
            $table->integer('third_range_count')->default(0)->comment('3. çocuğun çarpan kisi sayisini (fiyat hesaplama için) belirtir. ');
            $table->double('total_percentage')->comment('Toplam yüzde bilgisini (fiyat hesaplama için) belirtir. ');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_person_details');
    }
}
