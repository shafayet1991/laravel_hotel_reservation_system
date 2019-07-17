<?php

use App\Models\Room\RoomType;
use Illuminate\Database\Seeder;

class TestRoomTypesTableSeeder extends Seeder
{
    public function run()
    {
        factory(RoomType::class,1)->create();

        $model = RoomType::select('id')->get();
        $total = count($model);
        $this->command->info( __CLASS__." başarıyla oluşturuldu. Toplam {$total} veri eklendi.");
    }

}
