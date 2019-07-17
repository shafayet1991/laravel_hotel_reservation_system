<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            ['name' => 'Backpackers', 'slug' => 'backpackers','pivot_name' => 'backpackers'],
            ['name' => 'Ekonomik Oteller', 'slug' => 'economic-hotels','pivot_name' => 'economic'],
            ['name' => 'İş Konsepti','slug' => 'business-concept','pivot_name' => 'business'],
            ['name' => 'Nature/Wildlife','slug' => 'nature-wildlife','pivot_name' => 'nature'],
            ['name' => 'International','slug' => 'international','pivot_name' => 'international'],
            ['name' => 'Countryside','slug' => 'countryside','pivot_name' => 'countryside'],
            ['name' => 'Yurtiçi Oteller','slug' => 'domestic-hotels','pivot_name' => 'domestic'],
            ['name' => 'Termal Oteller','slug' => 'thermal-hotels','pivot_name' => 'thermal'],
            ['name' => 'Shopping','slug' => 'shopping','pivot_name' => 'shopping'],
            ['name' => 'Dağ Temalı Oteller','slug' => 'mountain-hotels', 'pivot_name' => 'mountain'],
            ['name' => 'Castle','slug' => 'castle','pivot_name' => 'castle'],
            ['name' => 'Adventure','slug' => 'adventure','pivot_name' => 'adventure'],
            ['name' => 'Budget/Backpackers','slug' => 'budget', 'pivot_name' => 'budget'],
            ['name' => 'Delux Oteller','slug' => 'delux-hotels', 'pivot_name' => 'delux'],
            ['name' => 'Tasarım Oteller','slug' => 'design-hotels', 'pivot_name' => 'design'],
            ['name' => 'Aile Otelleri','slug' => 'family-hotels','pivot_name' => 'family'],
            ['name' => 'Gurme Temalı Oteller','slug' => 'gourmet-hotels','pivot_name' => 'gourmet'],
            ['name' => 'Balayı Otelleri','slug' => 'honeymoon','pivot_name' => 'honeymoon'],
            ['name' => 'Golf Otelleri','slug' => 'golf-hotels','pivot_name' => 'golf'],
            ['name' => 'Spa/Relax','slug' => 'spa-relax-hotels','pivot_name' => 'spa'],
            ['name' => 'Kayak Otelleri','slug' => 'ski-hotels','pivot_name' => 'ski'],
            ['name' => 'Denize Sıfır Oteller','slug' => 'seaside-hotels','pivot_name' => 'seaside']
        ]);
    }
}
