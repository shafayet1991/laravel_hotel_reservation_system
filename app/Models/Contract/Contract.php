<?php

namespace App\Models\Contract;

use App\Models\Room\Room;
use App\Models\BoardType;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = ['id'];

    public function days()
    {
        return $this->hasMany(ContractDay::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function board_type()
    {
        return $this->belongsTo(BoardType::class);
    }
}
