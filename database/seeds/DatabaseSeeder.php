<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $toTruncate = [
        'currencies',
        'hotel_types',
        'countries',
        'cities',
        'counties',
        'airports',
        'board_types',
        'room_types',
        'file_types',
        'facility_categories',
        'facilities',
        'payment_types',
        'themes',
        'features',
        'tour_types',
        'users',
        'menus',
        'homepage_icons',
        'room_features',
        'room_possibilities',
        'hotel_board_types  ',
    ];

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $this->call([
            CurrenciesTableSeeder::class,
            HotelTypesTableSeeder::class,
            CountriesTableSeeder::class,
            CitiesTableSeeder::class,
            CountiesTableSeeder::class,
            AirportsTableSeeder::class,
            BoardTypesTableSeeder::class,
            RoomTypesTableSeeder::class,
            FileTypesTableSeeder::class,
            FacilityCategoriesTableSeeder::class,
            FacilitiesTableSeeder::class,
            PaymentTypesTableSeeder::class,
            ThemesTableSeeder::class,
            FeaturesTableSeeder::class,
            TourTypesTableSeeder::class,
            MenusTableSeeder::class,
            UsersTableSeeder::class,
            HomepageIconsTableSeeder::class,
            RoomFeaturesTableSeeder::class,
            RoomPossibilitiesTableSeeder::class,
            HotelBoardTypesTableSeeder::class,
        ]);
    }
}
