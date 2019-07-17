<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiveSixAndChildsToContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->decimal('five_price',8,2)->nullable()->comment('Five fiyatını belirtir.')->after('young_more_price_for_quad');
            $table->decimal('baby_one_price_for_five',8,2)->nullable()->after('five_price');
            $table->decimal('baby_more_price_for_five',8,2)->nullable()->after('baby_one_price_for_five');
            $table->decimal('child_one_price_for_five',8,2)->nullable()->after('baby_more_price_for_five');
            $table->decimal('child_more_price_for_five',8,2)->nullable()->after('child_one_price_for_five');
            $table->decimal('young_one_price_for_five',8,2)->nullable()->after('child_more_price_for_five');
            $table->decimal('young_more_price_for_five',8,2)->nullable()->after('young_one_price_for_five');

            $table->decimal('six_price',8,2)->nullable()->comment('Six fiyatını belirtir.')->after('young_more_price_for_five');
            $table->decimal('baby_one_price_for_six',8,2)->nullable()->after('six_price');
            $table->decimal('baby_more_price_for_six',8,2)->nullable()->after('baby_one_price_for_six');
            $table->decimal('child_one_price_for_six',8,2)->nullable()->after('baby_more_price_for_six');
            $table->decimal('child_more_price_for_six',8,2)->nullable()->after('child_one_price_for_six');
            $table->decimal('young_one_price_for_six',8,2)->nullable()->after('child_more_price_for_six');
            $table->decimal('young_more_price_for_six',8,2)->nullable()->after('young_one_price_for_six');
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
                'five_price',
                'baby_one_price_for_five',
                'baby_more_price_for_five',
                'child_one_price_for_five',
                'child_more_price_for_five',
                'young_one_price_for_five',
                'young_more_price_for_five',
                'six_price',
                'baby_one_price_for_six',
                'baby_more_price_for_six',
                'child_one_price_for_six',
                'child_more_price_for_six',
                'young_one_price_for_six',
                'young_more_price_for_six',
            ]);
        });
    }
}
