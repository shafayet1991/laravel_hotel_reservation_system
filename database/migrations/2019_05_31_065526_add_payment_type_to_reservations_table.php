<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentTypeToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->integer('payment_type')->nullable()->comment('Ödeme tipini belirtir. 1 Havale, 2 Kredi Kartı');
            $table->boolean('approval_information')->nullable()->comment('Ön bilgilendirme isteyip istemediğini belirtir.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['payment_type','approval_information']);
        });
    }
}
