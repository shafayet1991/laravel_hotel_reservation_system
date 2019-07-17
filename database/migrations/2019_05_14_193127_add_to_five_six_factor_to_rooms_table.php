<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToFiveSixFactorToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->decimal('five_factor',8,2)->nullable()->comment("Five çarpanını belirtir.")->after('quad_factor');
            $table->decimal('six_factor',8,2)->nullable()->comment("Six çarpanını belirtir.")->after('five_factor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn(['five_factor','six_factor']);
        });
    }
}
