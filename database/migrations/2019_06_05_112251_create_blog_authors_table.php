<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment('Blog yazarının adını belirtir.');
            $table->string('slug')->nullable()->comment('Blog yazarının url yapılandırmasını belirtir.');
            $table->string('title')->nullable()->comment('Blog yazarının ünvanını belirtir.');
            $table->string('email')->nullable()->comment('Blog yazarının email adresini belirtir.');
            $table->string('phone')->nullable()->comment('Blog yazarının telefon numarasını belirtir.');
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
        Schema::dropIfExists('blog_authors');
    }
}
