<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFontawesomeIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fontawesome_icons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon')->nullable()->comment('İkonun sınıfını belirtir.');
            $table->string('font')->nullable()->comment('İkonun fontunu belirtir.');
            $table->string('name')->nullable()->comment('İkonun adını belirtir.');
            $table->string('category')->nullable()->comment('İkonun kategorisini belirtir.');
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
        Schema::dropIfExists('fontawesome_icons');
    }
}
