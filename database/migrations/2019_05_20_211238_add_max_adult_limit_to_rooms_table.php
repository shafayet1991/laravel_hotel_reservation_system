<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaxAdultLimitToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('baby_count_limit_with_max_adult')->nullable()->after('max_young_count');
            $table->integer('child_count_limit_with_max_adult')->nullable()->after('baby_count_limit_with_max_adult');
            $table->integer('young_count_limit_with_max_adult')->nullable()->after('child_count_limit_with_max_adult');
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
            $table->dropColumn(['baby_count_limit_with_max_adult','child_count_limit_with_max_adult','young_count_limit_with_max_adult']);
        });
    }
}
