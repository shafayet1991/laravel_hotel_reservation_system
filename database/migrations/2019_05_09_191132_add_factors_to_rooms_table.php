<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFactorsToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->decimal('single_factor',8,2)->nullable()->comment("Single çarpanını belirtir.")->after('max_bed_count');
            $table->decimal('double_factor',8,2)->nullable()->comment("Double çarpanını belirtir.")->after('single_factor');
            $table->decimal('triple_factor',8,2)->nullable()->comment("Triple çarpanını belirtir.")->after('double_factor');
            $table->decimal('quad_factor',8,2)->nullable()->comment("Quad çarpanını belirtir.")->after('triple_factor');
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
            $table->dropColumn(['single_factor','double_factor','triple_factor','quad_factor']);
        });
    }
}
