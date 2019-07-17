<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment('Müşterinin adını belirtir.');
            $table->string('email')->nullable()->comment('Müşterinin email adresini belirtir.');
            $table->string('subject')->nullable()->comment('Müşterinin anlatmak istediği konunun adını belirtir.');
            $table->longText('message')->nullable()->comment('Müşterinin anlatmak istediği içeriği belirtir.');
            $table->string('ip_address')->nullable()->comment("Müşterinin ip adresini belirtir.");
            $table->text('user_agent')->nullable()->comment("Müşterinin tarayıcı bilgilerini belirtir.");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_customers');
    }
}
