<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tour_id')->nullable()->comment("Tur id sini belirtir.");
            $table->longText('description')->nullable()->comment("Açıklamayı belirtir.");
            $table->integer('adult_count')->nullable()->comment("Kişi sayısını belirtir.");
            $table->decimal('extra_bed_price',8,2)->nullable()->comment("Kişi sayısını belirtir.");
            $table->decimal('person_price',8,2)->nullable()->comment("Tek kişinin ücretini belirtir.");
            $table->decimal('maximum_child_price',8,2)->nullable()->comment("Maximum çoçuk yaşına bağlı olan spesifik fiyatkaru belirtir.");
            $table->decimal('free_child_price',8,2)->nullable()->comment("Ücretsiz çoçuk yaşınındaki spesifik fiyatları belirtir.");
            $table->integer('profit')->nullable()->comment("Yüzde olarak kar oranını belirtir.");
            $table->date('start_date')->nullable()->comment("Tur kalkış tarihini belirtir.");
            $table->date('end_date')->nullable()->comment("Tur dönüş tarihini belirtir.");
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
        Schema::dropIfExists('tour_prices');
    }
}
