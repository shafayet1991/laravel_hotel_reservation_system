<?php

use Illuminate\Database\Seeder;

class HotelBoardTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotel_board_types')->insert([
            ['name' => 'Ultra Her Şey Dahil'],
        ]);
    }
}
