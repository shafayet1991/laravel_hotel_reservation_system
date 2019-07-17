<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("Turun adını belirtir.");
            $table->longText('description')->nullable()->comment("Turun açıklamasını belirtir.");
            $table->longText('general_condition')->nullable()->comment("Turun genel şartlarını belirtir.");
            $table->longText('program')->nullable()->comment("Turun programını belirtir.");
            $table->integer('travel_type')->nullable()->comment("Seyahatin türünü belirtir.");
            $table->unsignedBigInteger('type_id')->nullable()->comment("Turun türünün id sini belirtir.");
            $table->unsignedBigInteger('departure_city_id')->nullable()->comment("Hangi şehirden kalkılacağını belirtir.");
            $table->unsignedBigInteger('return_city_id')->nullable()->comment("Hangi şehire dönüleceğini belirtir.");
            $table->integer('number_of_days')->nullable()->comment("Gün sayısını belirtir.");
            $table->text('places_to_visit')->nullable()->comment("Gezilecek yerleri belirtir.");
            $table->integer('free_child_age')->nullable()->comment("Ücretsiz çocuk yaşını belirtir.");
            $table->integer('maximum_child_age')->nullable()->comment("Maximum çocuk yaşını belirtir.");
            $table->string('period')->nullable()->comment("Dönemi belirtir.");
            $table->date('sales_start_date')->nullable()->comment("Satış başlangıç tarini belirtir.");
            $table->date('sales_end_date')->nullable()->comment("Satış bitiş tarini belirtir.");
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('tour_types')->onDelete('cascade');
            $table->foreign('departure_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('return_city_id')->references('id')->on('cities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
