<?php

use App\Models\Hotel\HotelType;
use Illuminate\Database\Seeder;

class HotelTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotel_types = [
            ['name' => 'Tatil Koyleri'],
            ['name' => 'Sizin İçin Seçtiğimiz Oteller'],
            ['name' => 'Şehir Otelleri'],
            ['name' => 'Termal Oteller'],
            ['name' => 'Kayak Otelleri'],
            ['name' => 'Villalar']
        ];

        foreach ($hotel_types as $name) {
            HotelType::create(
                $name
            );
        }
    }
}
