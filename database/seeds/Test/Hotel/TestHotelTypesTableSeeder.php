<?php

use App\Models\Hotel\HotelType;
use Illuminate\Database\Seeder;

class TestHotelTypesTableSeeder extends Seeder
{
    public function run()
    {
        factory(HotelType::class,1)->create();

        $model = HotelType::select('id')->get();
        $total = count($model);
        $this->command->info( __CLASS__." başarıyla oluşturuldu. Toplam {$total} veri eklendi.");
    }

}
