<?php

use Illuminate\Database\Seeder;

class RoomFeaturesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('room_features')->insert([
            ['name' => '55 m2'],
            ['name' => '20 m2'],
            ['name' => '1 Banyolu'],
            ['name' => '2 Banyolu'],
        ]);
    }
}
