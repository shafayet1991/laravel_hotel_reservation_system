<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('top_id')->nullable()->comment('Üst menünün id numarasını belirtir.');
            $table->string('tr_name')->nullable()->comment('Menünün türkçe adını belirtir.');
            $table->string('en_name')->nullable()->comment('Menünün ingilizce adını belirtir.');
            $table->string('ru_name')->nullable()->comment('Menünün rusça adını belirtir.');
            $table->string('ar_name')->nullable()->comment('Menünün arapça adını belirtir.');
            $table->string('slug')->nullable()->comment('Menünün linkini belirtir.');
            $table->string('template')->nullable()->comment('Menünün şablonunu belirtir.');
            $table->integer('rank')->nullable()->comment('Menün sıralamasını belirtir.');
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
        Schema::dropIfExists('menus');
    }
}
