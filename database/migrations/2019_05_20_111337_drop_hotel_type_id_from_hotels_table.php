<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropHotelTypeIdFromHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign('hotels_hotel_type_id_foreign');
            $table->dropColumn('hotel_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_type_id')->nullable()->comment("Otel tip id numarasını belirtir.");
            $table->foreign('hotel_type_id')->references('id')->on('hotel_types')->onDelete('cascade');
        });
    }
}
