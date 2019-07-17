<?php

use App\Models\BoardType;
use Illuminate\Database\Seeder;

class BoardTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotel_types = [
            ['name' => 'Ultra Herşey Dahil'],
            ['name' => 'Herşey Dahil'],
            ['name' => 'Tam Pansiyon'],
            ['name' => 'Yarım Pansiyon'],
            ['name' => 'Oda Kahvaltı'],
            ['name' => 'Breakfast Continental'],
            ['name' => 'Sadece Oda']
        ];

        foreach ($hotel_types as $name) {
            BoardType::create(
                $name
            );
        }
    }
}


