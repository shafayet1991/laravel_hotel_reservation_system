<?php

use App\Models\Tour\TourType;
use Illuminate\Database\Seeder;

class TourTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tour_types = [
            [ 'name' => 'Kültür Turları'],
            [ 'name' => 'Tekne Turları'],
        ];

        foreach ($tour_types as $name) {
            TourType::create(
                $name
            );
        }
    }
}
