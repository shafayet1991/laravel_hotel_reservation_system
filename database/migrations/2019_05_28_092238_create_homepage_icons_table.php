<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepageIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_icons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon')->nullable()->comment('İkonun sınıfını belirtir.');
            $table->string('title')->nullable()->comment('İkonun başlığını belirtir.');
            $table->longText('description')->nullable()->comment('İkonun açıklamasını belirtir.');
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
        Schema::dropIfExists('homepage_icons');
    }
}
