<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hotel_id')->nullable()->comment("Hotelin id numarası");
            $table->string('transfer_from_location')->nullable()->comment("Transfer işleminin nereden yapılacağını belirtir.");
            $table->string('transfer_to_location')->nullable()->comment("Transfer işleminin nereye yapılacağını belirtir.");
            $table->decimal('transfer_price',10,2)->nullable()->comment("Transfer işleminin ücretini belirtir.");
            $table->integer('transfer_type')->nullable()->comment("Transfer tipi kişi başı 1 toplu taşıma 2");
            $table->timestamps();

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
        Schema::dropIfExists('reservation_transfers');
    }
}
