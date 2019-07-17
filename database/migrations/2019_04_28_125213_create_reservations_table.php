<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id')->nullable()->comment("İlgili hotele ait odanın id numarası");
            $table->date('start_date')->nullable()->comment("Rezervasyon için giriş tarihini belirtir");
            $table->date('end_date')->nullable()->comment("Rezervasyon için çıkış tarihini belirtir");
            $table->integer('adult_count')->nullable(0)->comment("Yetişkin sayısını belirtir.");
            $table->integer('child_count')->nullable(0)->comment("Çocuk sayısını belirtir.");
            $table->integer('is_transportation')->default(0)->comment("Ulaşım istenmezse 1 uçak 2 transfer 4 otobüs 3");
            $table->enum('plane_round_trip',['a','b','c'])->nullable()->comment("Uçak ile gidiş dönüş seçimidir. 1 sadece dönüş istiyorum, 2 sadece gidiş istiyorum, 3 gidiş dönüş istiyorum");
            $table->integer('plane_passenger_type')->nullable()->comment("Uçak için yolcu tipleridir.");
            $table->string('plane_from_location')->nullable()->comment("Uçak nereden bilgisini tutar.");
            $table->string('plane_to_location')->nullable()->comment("Uçak nereye bilgisini tutar.");
            $table->enum('transfer_round_trip',['a','b','c','d'])->nullable()->comment("Transfer  için gidiş dönüş seçimidir. 1 sadece dönüş istiyorum, 2 sadece gidiş istiyorum, 3 gidiş dönüş istiyorum");
            $table->integer('transfer_passenger_type')->nullable()->comment("Transfer için yolcu tipleridir.");
            $table->string('reservation_transfer_ids')->nullable()->comment("Rezervsayon transfer idlerini tutmak için kullanılır. Ayrı bir tablo oluşturmamak için");
            $table->integer('bus_passenger_type')->nullable()->comment("Otobüs için yolcu tipleridir.");
            $table->string('bus_from_location')->nullable()->comment("Otobüs nereden bilgisini tutar.");
            $table->string('bus_to_location')->nullable()->comment("Otobüs nereye bilgisini tutar.");
            $table->integer('cancel_insurance')->nullable()->comment("İptal sigortası istenirse 1 istenmezse 0");
            $table->enum('person_gender',['a','b'])->nullable()->comment("Kişinin cinsiyetini belirtir.a erkek, b kız");
            $table->string('person_name')->nullable()->comment("Kişinin adını belirtir.");
            $table->string('person_surname')->nullable()->comment("Kişinin soyadını belirtir.");
            $table->string('person_email')->nullable()->comment("Kişinin email adresini belirtir.");
            $table->string('person_mobile')->nullable()->comment("Kişinin telefon numarasını belirtir.");
            $table->string('person_tc_no')->nullable()->comment("Kişinin T.C kimlik numarasını belirtir.");
            $table->integer('no_tc_citizen')->default(0)->comment("Kişinin T.C vatandaşı olup olmadığını belirtir. 0 Evet 1 Hayır");
            $table->integer('is_different_liaison')->nullable()->comment("Farklı bir irtibat bilgisinin olup olmayacağını belirtir. 0 hayır 1 evet");
            $table->string('liaison_person_name')->nullable()->comment("İrtibat numarasındaki kişinin adını belirtir.");
            $table->string('liaison_person_surname')->nullable()->comment("İrtibat numarasındaki kişinin soyadını belirtir.");
            $table->string('liaison_person_email')->nullable()->comment("İrtibat numarasındaki kişinin email adresini belirtir.");
            $table->string('liaison_person_mobile')->nullable()->comment("İrtibat numarasındaki kişinin telefon numarasını belirtir.");
            $table->integer('is_billing_information')->nullable()->comment("Fatura bilgisinin girilip girilmeyeceğini belirtir. 0 hayır 1 evet");
            $table->enum('billing_type',['a','b'])->nullable()->comment("Fatura tipinin bilgisini verir. a şahıs, b firma");
            $table->string('billing_person_name')->nullable()->comment("Faturalı kişinin adını belirtir.");
            $table->string('billing_person_surname')->nullable()->comment("Faturalı kişinin soyadını belirtir.");
            $table->string('billing_person_tc_no')->nullable()->comment("Faturalı kişinin T.C kimlik numarasını belirtir.");
            $table->text('billing_address')->nullable()->comment("Faturalı kişinin adres bilgisini belirtir.");
            $table->string('billing_email')->nullable()->comment("Fatura için email adresini belirtir.");
            $table->integer('billing_country')->nullable()->comment("Faturanın hangi ülkeye kesileceğini belirtir.");
            $table->integer('billing_city')->nullable()->comment("Faturanın hangi şehire kesileceğini belirtir.");
            $table->integer('billing_district')->nullable()->comment("Faturanın hangi ilçeye kesileceğini belirtir.");
            $table->integer('is_process_incomplete')->nullable()->comment("Rezervasyon işleminin yarıda kalmasında iletişime geçilip geçilmeyeceğini belirtir. 0 hayır, 1 evet");
            $table->integer('is_aware_campaign')->nullable()->comment("Kampanya ve fırsatlardan haberdar olup olmayacağını belirtir. 0 hayır, 1 evet");
            $table->integer('is_close_to_elevator')->nullable()->comment("Odanın asansöre yakın olup olmayacağını belirtir. 0 hayır, 1 evet");
            $table->integer('is_non_smoking')->nullable()->comment("Odanın içerisinde sigara içilip içilmediğini belirtir. 0 hayır, 1 evet");
            $table->integer('is_general_use')->nullable()->comment("Genel kullanım alanlarına yakın oda olup olmadığını belirtir. 0 hayır, 1 evet");
            $table->integer('is_upper_floor')->nullable()->comment("Üst katta yer alan oda olup olmadığını belirtir. 0 hayır, 1 evet");
            $table->decimal('total_amount',8,2)->nullable()->comment("Reservasyondaki toplam fiyatı belirtir.");
            $table->decimal('cancel_amount',8,2)->nullable()->comment('Reservasyondaki iptal sigortası fiyatını belirtir.');
            $table->decimal('transfer_amount',8,2)->nullable()->comment('Reservasyondaki transfer ücretlerinin toplam fiyatını belirtir.');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
