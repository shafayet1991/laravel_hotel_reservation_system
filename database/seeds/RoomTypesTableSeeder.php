<?php

use App\Models\Room\RoomType;
use Illuminate\Database\Seeder;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_types = [
            [ 'name' => 'Aile Odası'],
            [ 'name' => 'Deluxe Oda'],
            [ 'name' => 'Executive Oda'],
            [ 'name' => 'Standart Oda'],
            [ 'name' => 'Suite'],
        ];

        foreach ($room_types as $name) {
            RoomType::create(
                $name
            );
        }
    }
}
