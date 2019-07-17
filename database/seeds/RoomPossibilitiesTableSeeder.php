<?php

use Illuminate\Database\Seeder;

class RoomPossibilitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('room_possibilities')->insert([
            ['name' => 'Kurutma Makinesi'],
            ['name' => 'Oda Servisi'],
            ['name' => 'Balkon'],
            ['name' => 'Merkezi Klima'],
            ['name' => 'Banyo'],
            ['name' => 'Modem'],
        ]);
    }
}
