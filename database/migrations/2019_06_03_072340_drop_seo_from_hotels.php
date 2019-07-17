<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSeoFromHotels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn(['page_title','seo_title','seo_keyword','seo_description']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            Schema::table('hotels', function (Blueprint $table) {
                $table->string('page_title')->nullable()->comment('Otelin sayfa başlığını belirtir.');
                $table->string('seo_title')->nullable()->comment("Otel için seo başlığını belirtir.");
                $table->string('seo_keyword')->nullable()->comment("Otel için seo anahtar kelimelerini belirtir.");
                $table->text('seo_description')->nullable()->comment("Otel için seo açıklamasını belirtir.");
            });
        });
    }
}
