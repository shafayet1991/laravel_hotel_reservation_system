<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("Otel adını belirtir.");
            $table->unsignedBigInteger('airport_id')->nullable()->comment("Havaalanı id numarasını belirtir.");
            $table->unsignedBigInteger('hotel_type_id')->nullable()->comment("Otel tip id numarasını belirtir.");
            $table->unsignedBigInteger('currency_id')->nullable()->comment("Para birimi id numarasını belirtir.");
            $table->string('phone')->nullable()->comment("Otel telefon numarasını belirtir.");
            $table->string('email')->nullable()->comment("Otel email adresini belirtir.");
            $table->unsignedBigInteger('city_id')->nullable()->comment("Otelin bulunduğu şehir id numarasını belirtir.");
            $table->unsignedBigInteger('county_id')->nullable()->comment("Otelin bulunduğu şehirin ilçe id numarasını belirtir.");
            $table->text('address')->nullable()->comment("Otelin bulunduğu adres bilgisini belirtir.");
            $table->float('latitude',10,6)->nullable()->comment("Otelin bulunduğu enlem bilgisini belirtir.");
            $table->float('longitude',10,6)->nullable()->comment("Otelin bulunduğu boylam bilgisini belirtir.");
            $table->string('authorized_full_name')->nullable()->comment("Otel yetkili kişinin tam adını belirtir.");
            $table->string('authorized_phone')->nullable()->comment("Otel yetkili kişinin telefon numarasını belirtir.");
            $table->string('authorized_email')->nullable()->comment("Otel yetkili kişinin email adresini belirtir.");
            $table->time('checkout_time')->nullable()->comment("Otele giriş saatini belirtir.");
            $table->integer('ops_day')->nullable();
            $table->integer('min_day')->nullable();
            $table->date('season_date')->nullable();
            $table->boolean('reservation')->default(false);
            $table->string('seo_title')->nullable()->comment("Otel için seo başlığını belirtir.");
            $table->string('seo_keyword')->nullable()->comment("Otel için seo anahtar kelimelerini belirtir.");
            $table->text('seo_description')->nullable()->comment("Otel için seo açıklamasını belirtir.");
            $table->string('promo_photo')->nullable()->comment("Otel için reklam görselinin fiziksel yolunu belirtir.");
            $table->longText('hotel_description')->nullable()->comment("Otel için açıklama belirtir.");
            $table->string('airport_distance')->nullable()->comment("Otele olan havaalanı mesafesini belirtir.");
            $table->string('sea_distance')->nullable()->comment("Otele olan deniz mesafesini belirtir.");
            $table->string('shop_distance')->nullable()->comment("Otele olan market mesafesini belirtir.");
            $table->string('hospital_distance')->nullable()->comment("Otele olan hastane mesafesini belirtir.");
            $table->string('restaurant_distance')->nullable()->comment("Otele olan restaurant mesafesini belirtir.");
            $table->string('center_distance')->nullable()->comment("Otele olan merkez mesafesini belirtir.");
            $table->double('baby_age_limit')->nullable()->comment("Bebek yaşının sınırını belirtir. Kontrat detay sayfası için gereklidir sadece");
            $table->double('child_age_limit')->nullable()->comment("Çocuk yaşının sınırını belirtir. Kontrat detay sayfası için gereklidir sadece");
            $table->double('young_age_limit')->nullable()->comment("Genç yaşının sınırını belirtir. Kontrat detay sayfası için gereklidir sadece");
            $table->integer('commission_rate')->nullable()->comment("Otel için komisyon oranını belirtir.");
            $table->boolean('status')->default(true)->comment("Otel için rezervasyon alınıp almadığını belirtir. True ise rezervasyon alınabilir, false ise alınamaz");
            $table->timestamps();

            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('hotel_type_id')->references('id')->on('hotel_types')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
