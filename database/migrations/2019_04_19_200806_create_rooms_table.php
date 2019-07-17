<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("Odanın adını belirtir.");
            $table->string('code')->nullable()->comment("Odanın kısa kodunu belirtir.");
            $table->integer('count')->default(0)->comment("Oda Sayısını belirtir.");
            $table->integer('min_adult_count')->nullable()->comment("Minimum yetişkin sayısını belirtir.");
            $table->integer('max_adult_count')->nullable()->comment("Maksimum yetişkin sayısını belirtir.");
            $table->integer('min_baby_count')->nullable()->comment("Minimum bebek sayısını belirtir.");
            $table->integer('max_baby_count')->nullable()->comment("Maksimum bebek sayısını belirtir.");
            $table->integer('min_child_count')->nullable()->comment("Minimum cocuk sayısını belirtir.");
            $table->integer('max_child_count')->nullable()->comment("Maksimum cocuk sayısını belirtir.");
            $table->integer('min_young_count')->nullable()->comment("Minimum genç sayısını belirtir.");
            $table->integer('max_young_count')->nullable()->comment("Maksimum genç sayısını belirtir.");
            $table->integer('max_bed_count')->nullable()->comment("Maksimum yatak sayısını belirtir.");


            $table->unsignedBigInteger('hotel_id')->nullable()->comment("Odanın ait olduğu otelin id sini belirtir.");
            $table->unsignedBigInteger('room_type_id')->nullable()->comment("Odanın ait olduğu oda tipinin id sini belirtir.");
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }

}
