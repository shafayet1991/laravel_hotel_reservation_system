<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable()->comment('Logonun fiziksel yolunu belirtir.');
            $table->string('tr_title')->nullable()->comment('Bütün sayfaların türkçe başlığını belirtir.');
            $table->string('en_title')->nullable()->comment('Bütün sayfaların ingilizce başlığını belirtir.');
            $table->string('ru_title')->nullable()->comment('Bütün sayfaların rusça başlığını belirtir.');
            $table->string('ar_title')->nullable()->comment('Bütün sayfaların arapça başlığını belirtir.');
            $table->longText('tr_description')->nullable()->comment('Sitenin genel açıklamasını türkçe belirtir.');
            $table->longText('en_description')->nullable()->comment('Sitenin genel açıklamasını ingilizce belirtir.');
            $table->longText('ru_description')->nullable()->comment('Sitenin genel açıklamasını rusça belirtir.');
            $table->longText('ar_description')->nullable()->comment('Sitenin genel açıklamasını arapça belirtir.');
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
        Schema::dropIfExists('general_settings');
    }
}
