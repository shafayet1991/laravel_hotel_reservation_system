<?php

use App\Models\File\FileType;
use Illuminate\Database\Seeder;

class FileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotel_types = [
            ['name' => 'hotel_photos'],
            ['name' => 'tour_photos'],
            ['name' => 'tour_type_photos'],
            ['name' => 'room_photos'],
        ];

        foreach ($hotel_types as $name) {
            FileType::create(
                $name
            );
        }
    }
}
