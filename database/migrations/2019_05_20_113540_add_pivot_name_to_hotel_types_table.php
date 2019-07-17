<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPivotNameToHotelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_types', function (Blueprint $table) {
            $table->string('pivot_name')->nullable()->comment('Hotel tipini kaplayacak pivot adını belirtir.')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_types', function (Blueprint $table) {
            $table->dropColumn('pivot_name');
        });
    }
}
