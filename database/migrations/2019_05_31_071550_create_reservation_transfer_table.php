<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTransferTable extends Migration
{
    public function up()
    {
        Schema::create('reservation_transfer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reservation_id')->nullable()->comment('Rezervasyon id numarasını belirtir.');
            $table->unsignedBigInteger('reservation_transfer_id')->nullable()->comment('Rezervasyon transfer id numarasını belirtir.');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reservation_transfer_id')->references('id')->on('reservation_transfers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_transfer');
    }
}
