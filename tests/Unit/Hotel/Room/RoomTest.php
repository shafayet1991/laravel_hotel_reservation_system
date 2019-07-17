<?php

namespace Tests\Unit\Hotel\Room;

use App\Models\Room\Room;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class RoomTest extends TestCase
{
    private $room;

    public function setUp(): void
    {
        parent::setUp();
        $this->room = factory(Room::class)->make();
    }

    final public function test_room_seeder()
    {
        Artisan::call('db:seed', ['--class' => 'TestRoomsTableSeeder', '--database' => 'testing']);
        $this->assertTrue(true);
    }

    public function test_room_name()
    {
        $this->assertNotEmpty($this->room->name);
        $this->assertIsString($this->room->name);
    }

    public function test_room_photo()
    {
        $this->assertNotEmpty($this->room->photo);
    }

    public function test_room_hotel_id()
    {
        $this->assertNotEmpty($this->room->hotel_id);
        $this->assertIsNumeric($this->room->hotel_id);
        $this->assertIsInt($this->room->hotel_id);
    }

    public function test_room_room_type_id()
    {
        $this->assertNotEmpty($this->room->room_type_id);
        $this->assertIsNumeric($this->room->room_type_id);
        $this->assertIsInt($this->room->room_type_id);
    }

    public function tearDown(): void
    {
        // İzin verilen hafızadaki byte sayısını temizler. ? gc_collect_cycles()
        gc_collect_cycles();
        parent::tearDown();
    }
}
