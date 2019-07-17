<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageIconsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('homepage_icons')->insert([
            ['icon' => 'fa fa-umbrella-beach', 'title' => 'Bayanlar ve aileler için özel plaj ve havuzlar','description' => 'Tatil köylerimiz, otellerimiz ve villalarımızda, aileler ve bayanlar için özel olarak tasarlanmış açık ve kapalı yüzme havuzları ile sağlık ve spa merkezleri bulunmaktadır. Tatil köylerimizde İslami kurallara uygun deniz kıyafetleri ile kullanılabilen karışık aile plajları mevcuttur. Bazı tatil köylerimizde sadece bayanlara özel plajlar da bulunmaktadır.'],
            ['icon' => 'fa fa-utensils', 'title' => 'Helal yiyecekler ve alkolsüz içecekler','description' => 'Otel ve tatil köylerinde bulunan kafe ile restoranlarda helal yiyecek ve alkolsüz içecek imkanı bulunmaktadır. Müstakil villalarda kalan misafirler, helal gıda paketlerini önceden sipariş edebilirler.'],
            ['icon' => 'fab fa-pagelines', 'title' => 'Aile değerlerine uygun eğlence','description' => 'Tatil köylerimizde, çocuklara özel kulüpler ve oyun odaları bulunmakta olup, ailelere birlikte vakit geçirebilecekleri uygun olarak, ailece keyifli bir zaman geçirmeniz için hazırlanmıştır. Tesis yakınında ki şehir ve turistik yerlere günlük geziler ve kültür turları düzenlenmektedir.'],
            ['icon' => 'fa fa-users', 'title' => 'Kesin ve toplam aile fiyatlandırması','description' => 'Yetişkin sayıları ve çocuk yaşları göz önünde alınarak, aileler için kesin ve toplam fiyatlandırmalar yapılır.'],
            ['icon' => 'fa fa-money-bill-wave', 'title' => 'Fiyatlara vergi ve ücretler dâhildir','description' => 'Çoğu web sitesi ek misafirler için vergi ve ekstra ücretleri gizlemekte ve sadece <b>temel kullanım ücretini</b> misafirlerine göstermektedirler. Bu da reel fiyatlar arası karşılaştırma yapılmasını zorlaştırmaktadır. Bunun aksine biz ise, vergileri çocuklar dahil tüm misafirler için yatak ücretlerini de içeren <b>reel toplam fiyatları</b> göstermekteyiz.'],
            ['icon' => 'fa fa-bed', 'title' => 'Oda kapasite <br> garantisi','description' => 'Yetişkin sayıları ve çocuk yaşları hesaba katılıp; aileler, konaklayacakları en uygun odalara yerleştirilir. Sadece uygun odalar online olarak satışa sunulur.'],
        ]);
    }
}
