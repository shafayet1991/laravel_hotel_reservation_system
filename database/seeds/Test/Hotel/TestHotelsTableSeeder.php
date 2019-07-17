<?php

use App\Models\Airport;
use App\Models\City;
use App\Models\County;
use App\Models\Currency;
use App\Models\Hotel\HotelType;
use Illuminate\Database\Seeder;
use App\Models\Hotel\Hotel;
use Illuminate\Support\Facades\DB;

class TestHotelsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Hotel::class,1)->create([
            'airport_id' => $this->getRandomAirportId(),
            'hotel_type_id' => $this->getRandomHotelTypeId(),
            'currency_id' => $this->getRandomCurrencyId(),
            'city_id' => $this->getRandomCityId(),
            'county_id' => $this->getRandomCountyId(),
        ]);

        $model = Hotel::select('id')->get();
        $total = count($model);
        $this->command->info( __CLASS__." başarıyla oluşturuldu. Toplam {$total} veri eklendi.");
    }

    private function getRandomAirportId() {
        $airport = Airport::inRandomOrder()->first();
        return $airport->id;
    }

    private function getRandomHotelTypeId() {
        $type = HotelType::inRandomOrder()->first();
        return $type->id;
    }

    private function getRandomCurrencyId() {
        $currency = Currency::inRandomOrder()->first();
        return $currency->id;
    }

    private function getRandomCityId() {
        $city = City::inRandomOrder()->first();
        return $city->id;
    }

    private function getRandomCountyId() {
        $city_id = self::getRandomCityId();
        $county = County::where('city_id',$city_id)->inRandomOrder()->first();
        return $county->id;
    }
}
