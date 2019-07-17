<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("Resim şifrelenmiş adını ve fiziksel adını belirtir.");
            $table->integer('imageable_id')->nullable()->comment('İlişkisi kurulan modelin id numarasını belirtir.');
            $table->string('imageable_type')->nullable()->comment('İlişkisi kurulan modelin model yolunu belirtir.');
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
        Schema::dropIfExists('images');
    }
}
