<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("Özellik adını belirtir.");
            $table->string('icon')->nullable()->comment("Özellik ikonunu belirtir.");
            $table->unsignedBigInteger('facility_category_id')->nullable()->comment("Özellik kategori id numarasını belirtir.");
            $table->timestamps();

            $table->foreign('facility_category_id')->references('id')->on('facility_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
