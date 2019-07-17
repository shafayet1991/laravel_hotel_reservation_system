<?php

namespace App\Models\Contract;

use App\Models\Room\Room;
use Illuminate\Database\Eloquent\Model;

class ContractDay extends Model
{
    protected $guarded = ['id'];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
