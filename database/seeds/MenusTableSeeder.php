<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['top_id' => 0,'slug' => 'about-us','tr_name' => 'HAKKIMIZDA','en_name' => 'ABOUT US','ru_name' => 'Ru Test','ar_name' => 'Ar Test', 'template' => 'staticpage-template','rank' => '1'],
            ['top_id' => 0,'slug' => 'contact-us','tr_name' => 'İLETİŞİM','en_name' => 'CONTACT US','ru_name' => 'Ru Test','ar_name' => 'Ar Test', 'template' => 'staticpage-template','rank' => '2'],
            ['top_id' => 0,'slug' => 'otel','tr_name' => 'OTEL','en_name' => 'HOTEL','ru_name' => 'Ru Test','ar_name' => 'Ar Test', 'template' => 'hotel-template','rank' => '3'],
            ['top_id' => 0,'slug' => 'tur','tr_name' => 'TUR','en_name' => 'TOUR','ru_name' => 'Ru Test','ar_name' => 'Ar Test', 'template' => 'tour-template','rank' => '4'],
        ]);
    }
}
