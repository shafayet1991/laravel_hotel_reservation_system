<?php

namespace App\Models\Room;

use App\Helpers\Helper;
use App\Models\BoardType;
use App\Models\Contract\Contract;
use App\Models\File\File;
use App\Models\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public $rooms_path = "hotels/rooms";

    public function getCoverAttribute()
    {
        if (Helper::custom_check_empty($this->files()->orderBy('id', 'DESC')->first()) !== false) {
            $image = "hotels/rooms/" . $this->files()->orderBy('id', 'DESC')->first()->name;
        } else {
            $image = "images/no-image.png";
        }
        return $image;
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function details()
    {
        return $this->hasMany(RoomPersonDetail::class);
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function room_board_type()
    {
        return $this->belongsTo(BoardType::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function features()
    {
        return $this->belongsToMany(RoomFeature::class,'feature_room');
    }

    public function possibilities()
    {
        return $this->belongsToMany(RoomPossibility::class,'possibility_room');
    }
}
