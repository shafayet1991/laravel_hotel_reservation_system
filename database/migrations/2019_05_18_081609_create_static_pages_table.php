<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_id')->nullable()->comment('Sabit sayfanın ait olduğu menünün id numarasını belirtir.');
            $table->longText('tr_description')->nullable()->comment('Sabit sayfanın türkçe açıklamasını belirtir.');
            $table->longText('en_description')->nullable()->comment('Sabit sayfanın ingilizce açıklamasını belirtir.');
            $table->longText('ru_description')->nullable()->comment('Sabit sayfanın rusça açıklamasını belirtir.');
            $table->longText('ar_description')->nullable()->comment('Sabit sayfanın arapça açıklamasını belirtir.');
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
}
