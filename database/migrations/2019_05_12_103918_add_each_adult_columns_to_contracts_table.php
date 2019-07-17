<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEachAdultColumnsToContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->decimal('baby_one_price_for_triple',8,2)->nullable()->after('triple_price');
            $table->decimal('baby_more_price_for_triple',8,2)->nullable()->after('baby_one_price_for_triple');
            $table->decimal('child_one_price_for_triple',8,2)->nullable()->after('baby_more_price_for_triple');
            $table->decimal('child_more_price_for_triple',8,2)->nullable()->after('child_one_price_for_triple');
            $table->decimal('young_one_price_for_triple',8,2)->nullable()->after('child_more_price_for_triple');
            $table->decimal('young_more_price_for_triple',8,2)->nullable()->after('young_one_price_for_triple');

            $table->decimal('baby_one_price_for_quad',8,2)->nullable()->after('quad_price');
            $table->decimal('baby_more_price_for_quad',8,2)->nullable()->after('baby_one_price_for_quad');
            $table->decimal('child_one_price_for_quad',8,2)->nullable()->after('baby_more_price_for_quad');
            $table->decimal('child_more_price_for_quad',8,2)->nullable()->after('child_one_price_for_quad');
            $table->decimal('young_one_price_for_quad',8,2)->nullable()->after('child_more_price_for_quad');
            $table->decimal('young_more_price_for_quad',8,2)->nullable()->after('young_one_price_for_quad');
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
            $table->dropColumn([
                'baby_one_price_for_triple',
                'baby_more_price_for_triple',
                'child_one_price_for_triple',
                'child_more_price_for_triple',
                'young_one_price_for_triple',
                'young_more_price_for_triple',
                'baby_one_price_for_quad',
                'baby_more_price_for_quad',
                'child_one_price_for_quad',
                'child_more_price_for_quad',
                'young_one_price_for_quad',
                'young_more_price_for_quad',
            ]);
        });
    }
}
