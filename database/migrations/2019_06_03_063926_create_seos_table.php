<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_title')->nullable()->comment('Sayfa başlığını belirtir.');
            $table->string('seo_title')->nullable()->comment('Seo başlığını belirtir.');
            $table->text('seo_keyword')->nullable()->comment('Seo anahtar sözcüklerini belirtir.');
            $table->text('seo_description')->nullable()->comment('Seo açıklamasını belirtir.');
            $table->integer('seoable_id')->nullable()->comment('İlişkisi kurulan modelin id numarasını belirtir.');
            $table->string('seoable_type')->nullable()->comment('İlişkisi kurulan modelin model yolunu belirtir.');
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
        Schema::dropIfExists('seos');
    }
}
