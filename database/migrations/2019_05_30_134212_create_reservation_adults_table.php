<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationAdultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_adults', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reservation_id')->nullable()->comment("Rezervasyon id sini belirtir.");
            $table->string('adult_name')->nullable()->comment("Rezervasyondaki misafir yetişkinin adını belirtir.");
            $table->string('adult_surname')->nullable()->comment("Rezervasyondaki misafir yetişkinin soyadını belirtir.");
            $table->enum('adult_gender',['male','female'])->nullable()->comment("Rezervasyondaki misafir yetişkinin cinsiyetini belirtir.a erkek, b kız");
            $table->date('adult_birthday')->nullable()->comment("Rezervasyondaki misafir yetişkinin doğum tarihini belirtir");
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
        Schema::dropIfExists('reservation_adults');
    }
}
