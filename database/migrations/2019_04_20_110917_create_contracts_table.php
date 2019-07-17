<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_date')->nullable()->comment('Kontrat başlangıç tarihini belirtir.');
            $table->date('end_date')->nullable()->comment('Kontrat bitiş tarihini belirtir.');
            $table->unsignedBigInteger('room_id')->nullable()->comment('Oda id numarasını belirtir.');
            $table->unsignedBigInteger('board_type_id')->nullable()->comment('Pansiyon türünün id numarasını belirtir.');
            $table->decimal('extra_bed_price',8,2)->nullable()->comment('Ekstra yatak fiyatını belirtir.');
            $table->decimal('single_price',8,2)->nullable()->comment('Single fiyatını belirtir.');
            $table->decimal('double_price',8,2)->nullable()->comment('Double fiyatını belirtir.');
            $table->decimal('triple_price',8,2)->nullable()->comment('Triple fiyatını belirtir.');
            $table->decimal('quad_price',8,2)->nullable()->comment('Quad fiyatını belirtir.');
            $table->decimal('baby_one_price',8,2)->nullable()->comment('İlk bebeğin fiyatını belirtir.');
            $table->decimal('child_one_price',8,2)->nullable()->comment('İlk çocuğun fiyatını belirtir.');
            $table->decimal('young_one_price',8,2)->nullable()->comment('İlk gencing fiyatını belirtir.');
            $table->decimal('baby_single_one_price',8,2)->nullable()->comment('İlk bebeğin single olarak fiyatını belirtir.');
            $table->decimal('child_single_one_price',8,2)->nullable()->comment('İlk çocuğun single olarak fiyatını belirtir.');
            $table->decimal('young_single_one_price',8,2)->nullable()->comment('İlk gencin single olarak fiyatını belirtir.');
            $table->decimal('baby_more_price',8,2)->nullable()->comment('İlk bebekten sonraki bebeklerin fiyatını belirtir.');
            $table->decimal('child_more_price',8,2)->nullable()->comment('İlk çocuktan sonraki çocukların fiyatını belirtir.');
            $table->decimal('young_more_price',8,2)->nullable()->comment('İlk gençten sonraki gençlerin fiyatını belirtir.');
            $table->decimal('baby_single_more_price',8,2)->nullable()->comment('İlk bebekten sonraki bebeklerin single olarak fiyatını belirtir.');
            $table->decimal('child_single_more_price',8,2)->nullable()->comment('İlk çocuktan sonraki çocukların single olarak fiyatını belirtir.');
            $table->decimal('young_single_more_price',8,2)->nullable()->comment('İlk gençten sonraki gençlerin single olarak fiyatını belirtir.');
            $table->timestamps();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('board_type_id')->references('id')->on('room_board_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
