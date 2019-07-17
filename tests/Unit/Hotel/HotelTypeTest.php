<?php

namespace Tests\Unit\Hotel;

use App\Models\Hotel\HotelType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class HotelTypeTest extends TestCase
{
    private $type;

    public function setUp(): void
    {
        parent::setUp();
        $this->type = factory(HotelType::class)->make();
    }

    final public function test_hotel_type_seeder()
    {
        Artisan::call('db:seed', ['--class' => 'TestHotelTypesTableSeeder', '--database' => 'testing']);
        $this->assertTrue(true);
    }

    public function test_hotel_type_name()
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
