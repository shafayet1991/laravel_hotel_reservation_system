<?php

namespace Tests\Unit\Hotel;

use App\Models\Hotel\Hotel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class HotelTest extends TestCase
{
    private $hotel;

    public function setUp(): void
    {
        parent::setUp();
        $this->hotel = factory(Hotel::class)->make();
    }

    final public function test_hotel_seeder()
    {
        Artisan::call('db:seed', ['--class' => 'TestHotelsTableSeeder', '--database' => 'testing']);
        $this->assertTrue(true);
    }

    public function test_hotel_name()
    {
        $this->assertNotEmpty($this->hotel->name);
        $this->assertIsString($this->hotel->name);
    }

    public function test_hotel_airport_id()
    {
        $this->assertNotEmpty($this->hotel->airport_id);
        $this->assertIsNumeric($this->hotel->airport_id);
        $this->assertIsInt($this->hotel->airport_id);
    }

    public function test_hotel_hotel_type_id()
    {
        $this->assertNotEmpty($this->hotel->hotel_type_id);
        $this->assertIsNumeric($this->hotel->hotel_type_id);
        $this->assertIsInt($this->hotel->hotel_type_id);
    }

    public function test_hotel_currency_id()
    {
        $this->assertNotEmpty($this->hotel->currency_id);
        $this->assertIsNumeric($this->hotel->currency_id);
        $this->assertIsInt($this->hotel->currency_id);
    }

    public function test_hotel_phone()
    {
        $this->assertNotEmpty($this->hotel->phone);
        $this->assertIsString($this->hotel->phone);
    }
//
    public function test_hotel_email()
    {
        $this->assertNotEmpty($this->hotel->email);
        $this->assertIsString($this->hotel->email);
    }

    public function test_hotel_city_id()
    {
        $this->assertNotEmpty($this->hotel->city_id);
        $this->assertIsNumeric($this->hotel->city_id);
        $this->assertIsInt($this->hotel->city_id);
    }

    public function test_hotel_county_id()
    {
        $this->assertNotEmpty($this->hotel->county_id);
        $this->assertIsNumeric($this->hotel->county_id);
        $this->assertIsInt($this->hotel->county_id);
    }

    public function test_hotel_address()
    {
        $this->assertNotEmpty($this->hotel->address);
        $this->assertIsString($this->hotel->address);
    }

    public function test_hotel_latitude()
    {
        $this->assertNotEmpty($this->hotel->latitude);
    }

    public function test_hotel_longitude()
    {
        $this->assertNotEmpty($this->hotel->longitude);
    }

    public function test_hotel_authorized_phone()
    {
        $this->assertNotEmpty($this->hotel->authorized_phone);
    }

    public function test_hotel_checkout_time()
    {
        $this->assertNotEmpty($this->hotel->checkout_time);
    }

    public function test_hotel_ops_day()
    {
        $this->assertNotEmpty($this->hotel->ops_day);
    }

    public function test_hotel_min_day()
    {
        $this->assertNotEmpty($this->hotel->min_day);
    }

    public function test_hotel_reservation()
    {
        $this->assertIsBool($this->hotel->reservation);
    }

    public function test_hotel_seo_title()
    {
        $this->assertNotEmpty($this->hotel->seo_title);
    }

    public function test_hotel_seo_keyword()
    {
        $this->assertNotEmpty($this->hotel->seo_keyword);
    }

    public function test_hotel_seo_description()
    {
        $this->assertNotEmpty($this->hotel->seo_description);
    }

    public function test_hotel_promo_photo()
    {
        $this->assertNotEmpty($this->hotel->promo_photo);
    }

    public function test_hotel_hotel_description()
    {
        $this->assertNotEmpty($this->hotel->hotel_description);
    }

    public function test_hotel_airport_distance()
    {
        $this->assertNotEmpty($this->hotel->airport_distance);
    }

    public function test_hotel_sea_distance()
    {
        $this->assertNotEmpty($this->hotel->sea_distance);
    }

    public function test_hotel_shop_distance()
    {
        $this->assertNotEmpty($this->hotel->shop_distance);
    }

    public function test_hotel_hospital_distance()
    {
        $this->assertNotEmpty($this->hotel->hospital_distance);
    }

    public function test_hotel_restaurant_distance()
    {
        $this->assertNotEmpty($this->hotel->restaurant_distance);
    }

    public function test_hotel_center_distance()
    {
        $this->assertNotEmpty($this->hotel->center_distance);
    }

    public function test_hotel_first_child_limit()
    {
        $this->assertNotEmpty($this->hotel->first_child_limit);
    }

    public function test_hotel_second_child_limit()
    {
        $this->assertNotEmpty($this->hotel->second_child_limit);
    }

    public function test_hotel_third_child_limit()
    {
        $this->assertNotEmpty($this->hotel->third_child_limit);
    }

    public function test_hotel_commission_rate()
    {
        $this->assertNotEmpty($this->hotel->commission_rate);
    }

    public function test_hotel_status()
    {
        $this->assertIsBool($this->hotel->status);
    }

    public function tearDown(): void
    {
        // İzin verilen hafızadaki byte sayısını temizler. ? gc_collect_cycles()
        gc_collect_cycles();
        parent::tearDown();
    }
}
