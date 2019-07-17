<?php

namespace App\Models\Hotel;

use App\Helpers\Helper;
use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Facility\Facility;
use App\Models\Feature;
use App\Models\File\File;
use App\Models\PaymentType;
use App\Models\Reservation\ReservationTransfer;
use App\Models\Room\Room;
use App\Models\Seo\Seo;
use App\Models\Theme;
use App\Models\Tour\Tour;
use App\Services\HotelService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = ['id'];

    public $images_path = "hotels/images";

    public $promo_photos_path = "hotels/promo_photos";

    public function getPromoPhotoFileAttribute()
    {
        if (Helper::custom_check_empty($this->promo_photo) !== false) {
            return $this->promo_photos_path . "/" . $this->promo_photo;
        } else {
            return "images/no-image.png";
        }
    }

    public function getCoverAttribute()
    {
        return $this->files()->orderBy('id', 'DESC')->first()->name ?? null;
    }

    public function getPriceAttribute()
    {
        $rooms = HotelService::roomSearchByParams(1, 0, 0, null, null, $this->id);

        $price = count($rooms) ? min(array_column($rooms, 'price')) : 0;

        return $price;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class)->withPivot('id', 'is_paid')->withTimestamps();
    }

    public function payment_types()
    {
        return $this->belongsToMany(PaymentType::class);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }

    public function transfers()
    {
        return $this->hasMany(ReservationTransfer::class, 'hotel_id', 'id');
    }

    public function hotel_types()
    {
        return $this->belongsToMany(HotelType::class, 'hotel_type_hotel');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function board_type()
    {
        return $this->hasOne(HotelBoardType::class,'id','hotel_board_type_id');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class,'seoable');
    }

}
