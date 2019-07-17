<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reservation_id')->nullable()->comment("Rezervasyon id sini belirtir.");
            $table->string('child_name')->nullable()->comment("Rezervasyondaki misafir çocuğun adını belirtir.");
            $table->string('child_surname')->nullable()->comment("Rezervasyondaki misafir çocuğun soyadını belirtir.");
            $table->enum('child_gender',['male','female'])->nullable()->comment("Rezervasyondaki misafir çocuğun cinsiyetini belirtir.a erkek, b kız");
            $table->date('child_birthday')->nullable()->comment("Rezervasyondaki misafir çocuğun doğum tarihini belirtir");
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_children');
    }
}
