<?php

namespace Tests\Unit\Hotel;

use App\Models\Room\RoomType;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class RoomTypeTest extends TestCase
{
    private $type;

    public function setUp(): void
    {
        parent::setUp();
        $this->type = factory(RoomType::class)->make();
    }

    final public function test_hotel_type_seeder()
    {
        Artisan::call('db:seed', ['--class' => 'TestRoomTypesTableSeeder', '--database' => 'testing']);
        $this->assertTrue(true);
    }

    public function test_room_type_name()
    {
        $this->assertNotEmpty($this->type->name);
        $this->assertIsString($this->type->name);
    }

    public function tearDown(): void
    {
        // İzin verilen hafızadaki byte sayısını temizler. ? gc_collect_cycles()
        gc_collect_cycles();
        parent::tearDown();
    }
}
