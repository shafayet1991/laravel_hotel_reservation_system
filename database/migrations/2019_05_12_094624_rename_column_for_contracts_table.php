<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnForContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->renameColumn('baby_one_price', 'baby_one_price_for_double');
            $table->renameColumn('baby_more_price', 'baby_more_price_for_double');
            $table->renameColumn('child_one_price', 'child_one_price_for_double');
            $table->renameColumn('child_more_price', 'child_more_price_for_double');
            $table->renameColumn('young_one_price', 'young_one_price_for_double');
            $table->renameColumn('young_more_price', 'young_more_price_for_double');

            $table->renameColumn('baby_single_one_price', 'baby_one_price_for_single');
            $table->renameColumn('baby_single_more_price', 'baby_more_price_for_single');
            $table->renameColumn('child_single_one_price', 'child_one_price_for_single');
            $table->renameColumn('child_single_more_price', 'child_more_price_for_single');
            $table->renameColumn('young_single_one_price', 'young_one_price_for_single');
            $table->renameColumn('young_single_more_price', 'young_more_price_for_single');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->renameColumn('baby_one_price_for_double', 'baby_one_price');
            $table->renameColumn('baby_more_price_for_double', 'baby_more_price');
            $table->renameColumn('child_one_price_for_double', 'child_one_price');
            $table->renameColumn('child_more_price_for_double', 'child_more_price');
            $table->renameColumn('young_one_price_for_double', 'young_one_price');
            $table->renameColumn('young_more_price_for_double','young_more_price');

            $table->renameColumn('baby_one_price_for_single', 'baby_single_one_price');
            $table->renameColumn('baby_more_price_for_single', 'baby_single_more_price');
            $table->renameColumn('child_one_price_for_single', 'child_single_one_price');
            $table->renameColumn('child_more_price_for_single', 'child_single_more_price');
            $table->renameColumn('young_one_price_for_single', 'young_single_one_price');
            $table->renameColumn('young_more_price_for_single','young_single_more_price');
        });
    }
}
