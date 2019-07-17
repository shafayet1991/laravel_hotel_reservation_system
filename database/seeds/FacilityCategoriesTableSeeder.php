<?php

use App\Models\Facility\FacilityCategory;
use Illuminate\Database\Seeder;

class FacilityCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Activities'],
            ['name' => 'Dini'],
            ['name' => 'Dış Mekan'],
            ['name' => 'Etkinlikler'],
            ['name' => 'Eğlence'],
            ['name' => 'Genel'],
            ['name' => 'Hizmetler'],
            ['name' => 'Servis'],
            ['name' => 'Yiyecek & İçecek'],
            ['name' => 'Uydu Hizmetleri']
        ];

        foreach ($categories as $name) {
            FacilityCategory::create(
                $name
            );
        }
    }
}
