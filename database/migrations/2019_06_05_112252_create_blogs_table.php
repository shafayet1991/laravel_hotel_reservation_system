<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('author_id')->nullable()->comment('Blog yazarının id numarasını belirtir.');
            $table->string('name')->nullable()->comment('Blog adını belirtir.');
            $table->string('slug')->nullable()->comment('Blog url yapılandırmasını belirtir.');
            $table->integer('hit')->default(0)->comment('Blog görüntülenme sayısını belirtir.');
            $table->longText('description')->nullable()->comment('Blog içeriğini belirtir.');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('blog_authors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
