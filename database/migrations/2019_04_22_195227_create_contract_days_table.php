<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contract_id')->nullable()->comment("Kontrat id numarasını belirtir.");
            $table->unsignedBigInteger('room_id')->nullable()->comment("Oda id numarasını belirtir.");
            $table->date('date')->nullable()->comment("Tarihi belirtir.");
            $table->decimal('price',8,2)->nullable()->comment("Fiyatı belirtir.");
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
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
        Schema::dropIfExists('contract_days');
    }
}
