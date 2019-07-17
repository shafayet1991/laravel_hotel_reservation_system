<?php

use App\Models\Hotel\Hotel;
use App\Models\Room\Room;
use App\Models\Room\RoomType;
use Illuminate\Database\Seeder;

class TestRoomsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Room::class,1)->create([
            'hotel_id' => $this->getRandomHotelId(),
            'room_type_id' => $this->getRandomRoomTypeId(),
        ]);

        $model = Hotel::select('id')->get();
        $total = count($model);
        $this->command->info( __CLASS__." başarıyla oluşturuldu. Toplam {$total} veri eklendi.");
    }

    private function getRandomHotelId() {
        $hotel = Hotel::inRandomOrder()->first();
        return $hotel->id;
    }

    private function getRandomRoomTypeId() {
        $hotel = RoomType::inRandomOrder()->first();
        return $hotel->id;
    }
}
