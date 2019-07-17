<?php

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Bebek Dostu'],
            ['name' => 'Çocuk Dostu'],
            ['name' => 'Balayı Oteli'],
            ['name' => 'Spa Tesisi'],
            ['name' => 'Mavi Bayraklı']
        ];

        foreach ($categories as $name) {
            Feature::create(
                $name
            );
        }
    }
}
