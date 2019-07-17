<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("Dosya şifrelenmiş adını ve fiziksel adını belirtir.");
            $table->string('original_name')->nullable()->comment("Dosyanın yüklenirkenki orijinal adını belirtir.");
            $table->unsignedBigInteger('file_type_id')->nullable()->comment("Dosya tipi id numarasını belirtir.");
            $table->timestamps();

            $table->foreign('file_type_id')->references('id')->on('file_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
